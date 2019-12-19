<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;
use Cake\Database\Expression\QueryExpression;

/**
 * User component
 */
class UserProfile
{
    /**
     * Default configuration.
     * This component is use to get competitions data, how many points the freestyler get at compeititon with coliseum points
     *
     * data estructure
     * flyer
     * date
     * stages
     * season
     * league
     * points
     * coliseum points
     * @var array
     */
    //models
    public $MatchesUsers;
    //data root 
    public $user;
    public $league_id;
    public $competitions;
    //data result
    public $matches_list;
    public $data_result = [];
    //stages 
    private $stages = ['Dieciseisavos', 'Octavos', 'Cuartos', 'Semifinal', '3er_lugar', 'Final', 'Ganador'];

    public function __construct($user_id = null, $league_id = null)
    {
        $this->user_id = $user_id;
        $this->league_id = $league_id;
        $this->MatchesUsers =  TableRegistry::get('MatchesUsers');
    }

    public function beforeUpData()
    {
        $year = date('Y');
        $nextYear = date('Y', strtotime('+1 years', strtotime($year)));
        //get all matches in dates and user
        $user_id = $this->user_id;
        $this->matches_list = $this->MatchesUsers->Matches->find('all', ['contain' => ['Competitions.Seasons.Leagues']])->matching('MatchesUsers', function ($q) use ($user_id) {
            return $q->where(['MatchesUsers.user_id' => $user_id]);
        })->group(['Matches.id'])->where(['Competitions.date >=' => $year, 'Competitions.date <=' => $nextYear]);
        if ($this->league_id) {
            $this->matches_list->where(['Leagues.id' => $this->league_id]);
        }
    }
    public function setUpData()
    {
        foreach ($this->matches_list as $match) {
            $model = $match->competition->season->league;
            if ($this->league_id) {
                $model = $match->competition;
            }
            if (!(array_key_exists($model->id, $this->data_result))) {
                $this->getDataCompeitionOrLeague($model);
            }
            $this->getPointsByMatch(
                $match,
                $this->data_result[$model->id]['points']
            );
        }
    }

    public function getDataCompeitionOrLeague($model)
    {
        $this->data_result[$model->id]['flyer'] = $model->logo ? $model->logo : $model->flyer;
        $this->data_result[$model->id]['date']  = $model->date;
        $this->data_result[$model->id]['name'] = $model->name;
        $this->data_result[$model->id]['id'] = $model->id;
    }



    public function getPointsByMatches($matches_tmp, &$coliseum_points)
    {

        foreach ($matches_tmp as $match) {

            if (in_array($match->match->stage, $this->stages)) {
                $coliseum_points += 1;
                if ($match->match->stage === "Final") {
                    //only final stage set 2 points
                    $coliseum_points += 1;
                }
            }
        }
    }

    public function getPointsByMatch($match, &$points)
    {
        if (empty($points)) {
            $points = 0;
        }
        if (in_array($match->stage, $this->stages)) {
            $points_tmp = 1;
            if ($match->stage === "Final") {
                //only final stage set 2 points
                $points_tmp += 1;
            }
            $this->calculateColiseumPointsByMatch($match, $points, $points_tmp);
        }
    }


    public function calculateColiseumPoints(&$coliseum_points, $competition)
    {
        $coliseum_points = $coliseum_points *   $competition->bonus *  $competition->season->league->bonus;
    }
    public function calculateColiseumPointsByMatch($match, &$points, $points_tmp)
    {
        $points += ($points_tmp *   $match->competition->bonus *  $match->competition->season->league->bonus);
    }
    public function make()
    {
        $this->beforeUpData();
        $this->setUpData();
        return $this->data_result;
    }
}
