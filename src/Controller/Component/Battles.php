<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Database\Expression\QueryExpression;

class Battles
{
    // Model objectsSeasons
    private $MatchesUsers;
    private $required_args = ['competition_id'];

    // Report query
    public $competition;
    public $competition_slug;
    public $stage_name = [];

    //Report Data
    public $results = [];
    private $list;

    public function __construct($data = [])
    {
        $this->MatchesUsers = TableRegistry::get('MatchesUsers');
        $this->validateArgs($data);
        $this->competition =  $data['competition_id'];
    }

    public function make()
    {
        $this->setUpData();
        return $this->results;
    }

    private function setUpData()
    {
        $this->list = $this->MatchesUsers->find('all', ['contain' => ['Matches', 'Users.Crews'], 'order' => 'Matches.id'])->where(['Matches.competition_id' => $this->competition])->toArray();
        // echo implode($this->list);
        $this->orderData();
        die();
        //structure match, users in same stage
    }

    private function orderData()
    {
        foreach ($this->list as $battle) {
            // if (array_key_exists($battle->match->stage, $this->results)) {
            //     $this->users_list[$user->user_id]['points'] =  $this->users_list[$user->user_id]['points'] + $points;
            //     $this->users_list[$user->user_id]['score'] =  $this->users_list[$user->user_id]['score'] + $matches->score;
            // } else {
            //     $this->users_list[$user->user_id]['points'] =  $points;
            //     $this->users_list[$user->user_id]['score'] =  $matches->score;
            echo ('<br>');
            echo $battle->user->aka;
            echo ('<br>');
            echo $battle->user->avatar;
            echo ('<br>');
            echo $battle->user->crew ? $battle->user->crew->name : 'NA';
            echo ('<br>');
            echo $battle->match->id;
            echo ('<br>');
            echo $battle->match->stage;
            echo ('<br>');

            foreach ($this->results as $key => $stage) {
                echo "battles of " . $key;
                echo "battle";
                foreach ($stage as $match) {
                    foreach ($match as $users) {
                        echo $users;
                    }
                }
            }
        }
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
