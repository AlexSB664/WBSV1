<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Database\Expression\QueryExpression;

class LeaderboardRanking
{
    // Model objectsSeasons
    private $Seasons;
    private $Competitions;
    private $Matches;
    private $MatchesUsers;
    private $Users;
    private $required_args = ['season', 'competition'];

    // Report query
    public $season;
    public $competition;

    //Repor Data
    public $results = [];
    public $season_id;
    public $competition_id;
    public $matches_list;
    public $matches_data=[];
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

        $this->season = $data['season'];
        $this->competition =  $data['competition'];
    }

    public function make()
    {
        $this->setUpData();
        $row = 0;
        foreach ($this->matches_data as $match) {
            foreach ($match as $attrib) {
                echo ($attrib);
                echo (',');
            }
            echo ('<br>');
        }
        debug($this->matches_data);
        die();
        foreach ($this->matches_list as $match) {
            $colum = 0;
            echo $match;
            $row++;
        }

        return $this;
    }

    private function setUpData()
    {
        $this->season_id = $this->Seasons->find()->where(['slug' => $this->season])->first();
        $this->competition_id = $this->Competitions->find()->where(['slug' => $this->competition])->first();
        $this->matches_list = $this->getMatches($this->competition_id->id);
        $this->matches_data = $this->getIdsMatchesAndPoints($this->matches_list);

    }

    private function getMatches($competition_id)
    {
        return $this->Matches->find()->where(['competition_id' => $competition_id]);
    }

    private function validateArgs($data = [])
    {
        foreach ($this->required_args as $arg) {
            if (!array_key_exists($arg, $data)) {
                throw new \BadMethodCallException("Missing argument $arg of AccountMonthlyPaymentsReport");
            }
        }
    }

    private function getIdsMatchesAndPoints($matches)
    {
        $ids = [];
        foreach ($matches as $match) {
            $idsTmp['id'] = $match->id;
            $idsTmp['stage'] = $match->stage;
            $idsTmp['points'] = $match->points;
            $ids[]=$idsTmp;
        }
        return $ids;
    }
}
