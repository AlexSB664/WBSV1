<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Database\Expression\QueryExpression;

class Battles
{
    //exception stages
    private $hiddenStages = ['Cypher'];

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
        $this->cleancStages();
        return $this->results;
    }

    private function setUpData()
    {
        $this->list = $this->MatchesUsers->find('all', ['contain' => ['Matches', 'Users.Crews'], 'order' => 'Matches.id'])->where(['Matches.competition_id' => $this->competition])->toArray();
        $this->orderData();
    }

    private function orderData()
    {
        foreach ($this->list as $battle) {
            $this->results[$battle->match->stage][$battle->match->id][] = $battle->user;
        }
    }
    private function cleancStages()
    {
        foreach ($this->hiddenStages as $stage) {
            unset($this->results[$stage]);
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
