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
        return $this->users_list;
    }

    private function setUpData()
    {
        $this->season_id = $this->Seasons->find()->where(['slug' => $this->season])->first();
        $this->competition_id = $this->Competitions->find()->where(['slug' => $this->competition])->first();
        $this->matches_list = $this->getMatches($this->competition_id->id);
        foreach ($this->matches_list as $match) {
            $this->getUsersIdsByMatches($match->id, $match->points);
        }
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
            if (array_key_exists($user->user_id, $this->users_list)) {
                $this->users_list[$user->user_id]['points'] =  $this->users_list[$user->user_id]['points'] + $points;
            } else {
                $this->users_list[$user->user_id]['points'] =  $points;
            }
        }
    }

    public function getUser($users_id)
    {
        $users = $this->MatchesUsers->Users->get($users_id);
        return $users;
    }
    public function getCrew($crew_id)
    {
        if ($crew_id != 0 && $crew_id != null) {
            $crew = $this->Crews->get($crew_id);
            return $crew->name;
        } else {
            return 'NA';
        }
    }

    public function getData()
    {
        //order by points
        arsort($this->users_list, false);

        foreach ($this->users_list as $key => $user) {
            $userTmp = $this->getUser($key);
            $this->users_list[$key]['aka'] = $userTmp->aka;
            $this->users_list[$key]['avatar'] = $userTmp->avatar;
            $this->users_list[$key]['crew'] = $this->getCrew($userTmp->crew);
            $this->users_list[$key]['position'] = $this->position_count;
            $this->position_count++;
        }
        // foreach ($this->users_list as $key => $user) {
        //     echo ($key . ':');
        //     echo ($user['points'] . ' : ');
        //     echo ($user['position'] . ' : ');
        //     echo ($user['aka'] . ' : ');
        //     echo ($user['avatar'] . ' : ');
        //     echo ($user['crew'] . ' : ');
        //     echo ('<br>');
        // }
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
