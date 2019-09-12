<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Competitions;

/**
 * SeasonsReports Controller
 *
 *
 * @method \App\Model\Entity\SeasonsReport[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LeaderboardController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        // $this->loadModel('Competitions');
        // $this->loadModel('Leagues');
        // $this->loadModel('Users');
        // $this->loadModel('CompetitionsUsers');
        // $this->loadModel('Matches');
        $this->leaguesTable = TableRegistry::get('leagues');
        $this->seasonsTable = TableRegistry::get('seasons');
        $this->competitionsTable = TableRegistry::get('competitions');
        $this->matchesTable = TableRegistry::get('matches');
        $this->matches_usersTable = TableRegistry::get('matches_users');
        $this->usersTable = TableRegistry::get('users');
    }

    public function index($league=null, $season=null, $competition=null )
    {
        $this->viewBuilder()->layout('public');

	$leagues = $this->leaguesTable->find('all')
			->where(['leagues.name' => $league ]);

        $leagues = $this->paginate($leagues);

        $this->set(compact('leagues'));
    }

    public function seasons($id=null)
    {
        $this->viewBuilder()->layout('public');

        $seasons = $this->seasonsTable->find()->where(['league_id'=>$id]);

        $seasons = $this->paginate($seasons);

        $this->set(compact('seasons'));
    }

    public function competitions($id=null)
    {
        $this->viewBuilder()->layout('public');

        $competitions = $this->competitionsTable->find()->where(['season_id'=>$id]);

        $competitions = $this->paginate($competitions);

        $this->set(compact('competitions'));
    }

    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->allow(['index','seasons','competitions']);
    }
}
