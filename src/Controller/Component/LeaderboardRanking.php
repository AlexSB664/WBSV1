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
    public $usersId_list_index = [];
    public $users_list = [];
    public $position_count = 1;

    public function __construct($data = [])
    {
        $this->Seasons =  TableRegistry::get('Seasons');
        $this->Competitions =  TableRegistry::get('Competitions');
        $this->Matches =  TableRegistry::get('Matches');
        $this->MatchesUsers = TableRegistry::get('MatchesUsers');
        $this->Crews = TableRegistry::get('Crews');
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
            $this->getUsersIdsByMatches($match->id, $match->points);
        }
        //limpiando ids de usuarios
        $this->wipeUsersByPoints();
        //work here
        $this->getData();
    }

    private function getMatches($competition_id)
    {
        return $this->Matches->find()->where(['competition_id' => $competition_id]);
    }

    public function getUsersIdsByMatches($matches_id, $points)
    {
        $users = $this->MatchesUsers->find()->where(['match_id' => $matches_id]);
        foreach ($users as $user) {
            if (array_key_exists($points, $this->usersId_list)) {
                $usersTmp = $this->usersId_list[$points];
            }
            $usersTmp[] =  $user->user_id;
            $this->usersId_list[$points] = $usersTmp;
        }
        $this->usersId_list_index[] = $points;
    }

    public function wipeUsersByPoints()
    {
        ksort($this->usersId_list);
        $this->usersId_list = array_reverse($this->usersId_list, true);
        //wipe index by points, and order by more hit
        $this->usersId_list_index = array_unique($this->usersId_list_index);
        sort($this->usersId_list_index);
        $this->usersId_list_index = array_reverse($this->usersId_list_index, true);

        //wipe repety users by keys
        $wipeTmp;
        foreach ($this->usersId_list as $key => $value) {
            if (empty($wipeTmp)) {
                $wipeTmp  = $value;
            } else {
                $tmp = $value;
                $this->usersId_list[$key] = array_diff($value, $wipeTmp);
                $wipeTmp  = $tmp;
            }
        }
    }

    public function getUser($users_id)
    {
        $users = $this->MatchesUsers->Users->get()->where(['id IN' => $users_id]);
        return $users;
    }
    public function getCrew($crew_id)
    {
        if ($crew_id != 0 && $crew_id != null) {
            $crew = $this->Crews->get($crew_id);
            return $crew->name;
        } else {
            return null;
        }
    }

    public function getData()
    {
        //get data by keys
        $dataTmp = [];
        foreach ($this->usersId_list as $users_data) {
            echo implode(',', $users_data);
            echo ('<br>');
        }
        var_dump(array_keys($this->usersId_list));
        die();
        //i stop here
        foreach ($this->usersId_list as $key => $values) {
            echo ($values);
            echo ($key);
            foreach ($values as $value) { 
                $this->data = $this->getRow($value,$key);
            }
        }
    }

    public function getRow($users_id, $points)
    {
        //Posicion Freestyler Avatar  Crew Puntos
        $userTmp = getUser($users_id);
        $crewTmp = getCrew($userTmp->crew_id);
        $rowTmp = [];
        $rowTmp['Position'] = $this->position_count;
        $rowTmp['Aka'] = $userTmp->aka;
        $rowTmp['Avatar'] = $userTmp->avatar;
        $rowTmp['Crew'] = $crewTmp ? $crewTmp : 'NA';
        $rowTmp['Points'] = $points;
        $this->position_count++;
        return $rowTmp;
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
