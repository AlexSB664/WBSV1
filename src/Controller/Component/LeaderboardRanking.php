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
    private $required_args = ['league', 'season', 'competition'];

    // Report query
    public $league;
    public $season;
    public $competition;
    public $competition_slug;

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
        $this->league = $data['league'];
        $this->competition_slug = $data['competition'];;
    }

    public function make()
    {
        $this->beforeUpData();
        $this->setUpData();
        return $this->users_list;
    }

    private function beforeUpData()
    {
        $this->season = $this->getSeasonByLeague($this->league, $this->season);
        $this->competition  = $this->getCompetitionBySeason($this->season, $this->competition);
    }

    private function setUpData()
    {
        if ($this->competition_slug != 'all') {
            $this->matches_list = $this->getMatches($this->competition->id);
        } else {
            $this->competition_id = $this->Competitions->getCompetitionsBySeason($this->season->id);
            $this->matches_list = $this->getMatchesByMultipleCompetitions($this->competition_id);
        }
        foreach ($this->matches_list as $match) {
            $this->getUsersIdsByMatches($match, $match->points);
        }
        $this->getData();
    }

    private function getMatches($competition_id)
    {
        return $this->Matches->find()->where(['competition_id' => $competition_id]);
    }

    private function getMatchesByMultipleCompetitions($competitions_id)
    {
        return $this->Matches->find()->where(['competition_id IN' => $competitions_id]);
    }

    public function getUsersIdsByMatches($matches, $points)
    {
        $users = $this->MatchesUsers->find()->where(['match_id' => $matches->id]);
        foreach ($users as $user) {
            if (array_key_exists($user->user_id, $this->users_list)) {
                $this->users_list[$user->user_id]['points'] =  $this->users_list[$user->user_id]['points'] + $points;
                $this->users_list[$user->user_id]['score'] =  $this->users_list[$user->user_id]['score'] + $matches->score;
            } else {
                $this->users_list[$user->user_id]['points'] =  $points;
                $this->users_list[$user->user_id]['score'] =  $matches->score;
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
            $this->users_list[$key]['crew'] = $this->getCrew($userTmp->crew_id);
            $this->users_list[$key]['position'] = $this->position_count;
            $this->position_count++;
        }
    }

    public function getSeasonByLeague($league_id, $season_slug)
    {
        return $this->Seasons->find()->where(['slug' => $season_slug, 'league_id' => $league_id])->first();
    }

    public function getCompetitionBySeason($season, $competition_slug)
    {
        return $this->Competitions->find()->where(['slug' => $competition_slug, 'season_id' => $season->id])->first();
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
