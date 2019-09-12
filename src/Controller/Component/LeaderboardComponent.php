<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Database\Expression\QueryExpression;

class LeaderboardComponent
{
    // Model objects
    private $Accounts;
    private  $Periods;
    private $Users;
    private $Payments;
    private $required_args = ['season', 'competition'];

    // Report query
    public $period;
    public $year;
    public $agent;
    public $group_id;

    //Repor Data
    public $results = [];
    public $accounts_period;
    public $current_period;
    public $monthly_payments;
    public $agents;
    public $start_date;
    public $end_date;


    public function __construct($data = [])
    {
        $this->Seasons =  TableRegistry::get('Seasons');
        $this->Competitions =  TableRegistry::get('Competitions');
        $this->Matches =  TableRegistry::get('Matches');
        $this->MatchesUsers = TableRegistry::get('MatchesUsers');
        $this->Users = TableRegistry::get('Users');

        $this->validateArgs($data);

        $this->period = $data['period'];
        $this->year =  $data['year']['year'] ?: date("Y");
        $this->agent = $data['agent'] ?: null;
        $this->group_id = $data['group_id'];
    }

    public function make()
    {
        $this->setUpData();
        $row = 0;

        foreach ($this->agents as $agent) {
            $colum = 0;
            $accounts_ids = $this->getAccountsIds($agent);
            $this->setBaseData($agent, $accounts_ids, $row, $colum);
            $this->setMonthlyPaymentsData($accounts_ids, $row, $colum);
            $row++;
        }

        return $this;
    }

    private function setBaseData($agent, $accounts, &$row, &$colum)
    {
        $collected_accounts = $this->getCollectedAccounts($accounts, $this->start_date, $this->end_date);
        $this->results[$row][$colum] = "Periodo " . $this->period . " " . $this->year;
        $this->results[$row][$colum += 1] = $agent->full_name;
        $this->results[$row][$colum += 1] = count($accounts);
        $this->results[$row][$colum += 1] = $this->getToCharge($accounts);
        $this->results[$row][$colum += 1] = $collected_accounts;
        $this->results[$row][$colum += 1] =  count($accounts) == 0 ? 0 : round(($collected_accounts /  count($accounts)) * 100, 2) . '%';
    }

    private function setMonthlyPaymentsData($accounts, &$row, &$colum)
    {
        for ($month = 1; $month <= $this->monthly_payments; $month++) {
            $this->results[$row][$colum += 1] = $this->getCollectedMonthlyPayment($accounts, $month);
            $this->results[$row][$colum += 1] = $this->getAmountCollectedMonthlyPayment($accounts, $month);
        }
    }

    private function setUpData()
    {
        $this->accounts_period = $this->Periods
            ->find('period', ['period' => $this->period])
            ->find('year', ['year' => $this->year])
            ->first();

        $this->current_period = $this->Periods
            ->find('week', ['week' => date('W')])
            ->find('year', ['year' => date('Year')])
            ->first();

        $this->monthly_payments = $this->monthlyPaymentsToShow($this->accounts_period, $this->current_period);

        $this->agents = $this->agent
            ? $this->Users->find('byId', ['id' => $this->agent])
            : $this->Users->find('byRoleAndActive', ['role' => 'Agente Financiera'])->find('byGroup', ['group_id' => $this->group_id]);

        if ($this->accounts_period) {
            $this->start_date = $this->weekDate($this->accounts_period->year, $this->accounts_period->week_start, 1);
            $this->end_date = $this->weekDate($this->accounts_period->year, $this->accounts_period->week_end, 1);
        }
    }

    private function getAccountsIds($agent)
    {
        return array_map(
            [$this->Accounts, 'getIds'],
            $this->Accounts->find('byPeriod', [
                'initial_date' => $this->start_date,
                'final_date' => $this->end_date,
                'group_id' => $this->group_id
            ])
                ->find('byUser', ['user_id' => $agent->id])
                ->toArray()
        );
    }

    private function getToCharge(array $accounts_ids)
    {
        if (empty($accounts_ids))
            return 0;

        return  $this->Accounts->find('inIds', ['ids' => $accounts_ids])->sumOf('total_funding');
    }

    private function getCollectedAccounts(array $accounts_ids, $initial_date, $final_date)
    {
        if (empty($accounts_ids))
            return 0;

        return $this->Accounts
            ->find('inIds',  ['ids' => $accounts_ids])
            ->innerJoinWith('Payments')
            ->where(['Payments.status' => 'APROBADO'])
            ->where(['Payments.type' => 'Pago Corriente'])
            ->where(['DATE(Payments.approved_date) <= ' => $this->end_date])
            ->group('Accounts.id')
            ->count();
    }

    private function getCollectedMonthlyPayment(array $accounts_ids, $monthly_payment = 1)
    {
        if (empty($accounts_ids))
            return 0;

        return $this->Accounts
            ->find('inIds',  ['ids' => $accounts_ids])
            ->innerJoinWith('Payments')
            ->where(['Payments.status' => 'APROBADO'])
            ->where(['Payments.payment_date' => $monthly_payment])
            ->group('Accounts.id')
            ->count();
    }

    private function getAmountCollectedMonthlyPayment(array $accounts_ids, $monthly_payment = 1)
    {
        if (empty($accounts_ids))
            return 0;

        return $this->Payments
            ->find('all')
            ->where(['account_id IN' => $accounts_ids])
            ->where(['status' => 'APROBADO'])
            ->where(['payment_date' => $monthly_payment])
            ->sumOf('payment_mount');
    }

    private function monthlyPaymentsToShow($accounts_period, $current_period)
    {
        if (!$accounts_period || $accounts_period->year > $current_period->year)
            return 0;

        if ($accounts_period->year == $current_period->year) {

            if ($accounts_period->period > $current_period->period)
                return 0;

            return ($current_period->period - $accounts_period->period)  + 1;
        }

        if ($accounts_period->year < ($current_period->year - 1))
            return 12;

        $monthly_payments = (13 - $accounts_period->period) + 1;
        $monthly_payments += $current_period->period;

        return $monthly_payments > 12 ? 12 : $monthly_payments;
    }

    private  function weekDate($year, $week, $day)
    {
        $date = strtotime($year . 'W' . str_pad($week, 2, 0, STR_PAD_LEFT) . $day);
        $date = date('Y-m-d', $date);
        return $date;
    }

    private function validateArgs($data = [])
    {
        foreach ($this->required_args as $arg) {
            if (!array_key_exists($arg, $data)) {
                throw new \BadMethodCallException("Missing argument $arg of AccountMonthlyPaymentsReport");
            }
        }
    }
}
