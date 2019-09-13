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
    public $usersId_list = [];
    public $users_list = [];
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
        $this->validateArgs($data);

        $this->season = $data['season'];
        $this->competition =  $data['competition'];
    }

    public function make()
    {
        $this->setUpData();
        $row = 0;
        //test    
        foreach ($this->matches_list as $match) {
            $colum = 0;
            echo $match->id;
            echo (',');
            echo $match->points;
            echo (',');
            echo $match->stage;
            echo ('<br>');
            $row++;
        }

        return $this;
    }

    private function setUpData()
    {
        $this->season_id = $this->Seasons->find()->where(['slug' => $this->season])->first();
        $this->competition_id = $this->Competitions->find()->where(['slug' => $this->competition])->first();
        $this->matches_list = $this->getMatches($this->competition_id->id);
        foreach ($this->matches_list as $match) {
            $this->getUsersIdsByMatches($match->id);
        }
        //limpiando ids de usuarios
        $this->usersId_list = array_unique($this->usersId_list);
        $this->usersId_list= array_diff($this->usersId_list, ['']); 
        $this->getUsers($this->usersId_list);
        //show ids from users
        echo implode(',',$this->usersId_list);
        echo('<br>');
        foreach ($this->usersId_list as $users) {
            echo($users);
            echo('<br>');
        }

    }

    private function getMatches($competition_id)
    {
        return $this->Matches->find()->where(['competition_id' => $competition_id]);
    }

    public function getUsersIdsByMatches($matches_id)
    {
        $users = $this->MatchesUsers->find()->where(['match_id'=>$matches_id]);
        foreach ($users as $user) {
            $this->usersId_list[]=$user->user_id;     
        }
    }

    public function getUsers($usersId)
    {
        $users = $this->MatchesUsers->Users->find()->where(['id IN'=>$usersId]);
        foreach ($users as $user) {
            echo($user->aka);
            $this->users_list[]=$user->user_id;     
        }
        die();
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
