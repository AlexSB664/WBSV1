<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Database\Expression\QueryExpression;

class FreestylersRanking
{
    //statitc data
    private $stages = ['Dieciseisavos', 'Octavos', 'Cuartos', 'Semifinal', '3er_lugar', 'Final', 'Ganador', 'fms_gana_sr', 'fms_gana_cr', 'fms_pierde_cr', 'fms_empate'];
    // Model objectsSeasons
    private $Matches;
    private $MatchesUsers;
    private $required_args = ['year'];

    // Report query
    public $year;
    public $nextYear;

    //Repor Data
    public $matches_list;
    public $users_list = [];
    public $users_count = 0;
    public $position_count = 1;
    public $real_position_count = 1;
    public $data = [];

    public function __construct($data = [])
    {
        $this->Matches =  TableRegistry::get('Matches');
        $this->MatchesUsers = TableRegistry::get('MatchesUsers');
        $this->validateArgs($data);
        $this->year = $data['year'];
        $this->nextYear = date('Y', strtotime('+1 years', strtotime($this->year)));
        // $this->nextYear = $this->year+1;

    }

    public function make()
    {
        $this->beforeUpData();
        $this->setUpData();
        return $this;
    }

    private function beforeUpData()
    {
        $this->matches_list = $this->Matches->find('all', ['contain' => ['Competitions.Seasons.Leagues']])->where(['Competitions.date >=' => $this->year, 'Competitions.date <=' => $this->nextYear]);
    }

    private function setUpData()
    {
        foreach ($this->matches_list as $match) {
            $this->getUsersIdsByMatches($match);
        }
        $this->getData();
    }

    public function getUsersIdsByMatches($matches)
    {
        $users = $this->MatchesUsers->find()->where(['match_id' => $matches->id]);
        foreach ($users as $user) {
            if (array_key_exists($user->user_id, $this->users_list)) {
                $this->users_list[$user->user_id]['points'] =  $this->users_list[$user->user_id]['points'] +  $this->getColiseumPoint(
                    $matches->stage,
                    $matches->competition->season->league->bonus,
                    $matches->competition->bonus
                );
            } else {
                $this->users_list[$user->user_id]['points'] = $this->getColiseumPoint(
                    $matches->stage,
                    $matches->competition->season->league->bonus,
                    $matches->competition->bonus
                );
            }
        }
    }

    public function getColiseumPoint($stage = null, $bonus_league = null, $bonus_competition = null)
    {
        $points = 0;
        if (in_array($stage, $this->stages)) {
            $pointsTmp = 1;
            if ($stage === "Final"  | $stage === "fms_gana_cr") {
                $pointsTmp = 2;
            }
            if ($stage === "fms_gana_sr") {
                $pointsTmp = 3;
            }
            $points = $pointsTmp * $bonus_league * $bonus_competition;
        }
        return $points;
    }

    public function getUser($users_id)
    {
        $users = $this->MatchesUsers->Users->get($users_id);
        return $users;
    }

    public function getData()
    {
        //order by points
        arsort($this->users_list, false);
        $this->users_count =  count($this->users_list);
        $pointsTmp = 0;
        foreach ($this->users_list as $key => $user) {
            $this->users_list[$key]['user_id'] = $key;

            if ($key === array_key_first($this->users_list)) {
                $pointsTmp = $this->users_list[$key]['points'];
            }
            if (!($this->users_list[$key]['points'] === $pointsTmp)) {
                $this->position_count = $this->real_position_count;
                $pointsTmp = $this->users_list[$key]['points'];
            }
            $userTmp = $this->getUser($key);
            $this->users_list[$key]['aka'] = $userTmp->aka;
            $this->users_list[$key]['avatar'] = $userTmp->avatar;
            $this->users_list[$key]['position'] = $this->position_count;
            $this->real_position_count++;
        }
    }

    private function validateArgs($data = [])
    {
        foreach ($this->required_args as $arg) {
            if (!array_key_exists($arg, $data)) {
                throw new \BadMethodCallException("Missing argument $arg of FreestylersRanking");
            }
        }
    }
}
