<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;

/**
 * Policy component
 */
class PolicyComponent extends Component
{
    public function __construct()
    {
        $this->LeaguesUsers = TableRegistry::get('LeaguesUsers');
        $this->Competitions = TableRegistry::get('Competitions');
    }
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function organizerPolicies($data = [])
    {
        $user = $this->LeaguesUsers->Users->get($data['user']);
        $leagues = $this->LeaguesUsers->getLeaguesByUser($user->id);
        debug($data);
        if (isset($data['competition'])) {
            echo 'este';
            return false;
        }
        if ($data['season']) {
            echo 'este2';
            return false;
        }
        if ($data['league']) {
            echo 'este3';
            return false;
        }
        die();
    }

    public function leagueManage()
    {
    }
    public function seasonManage()
    {
    }
    public function competitionManage()
    {
    }
}
