<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Competitions;
use Cake\Routing\Router;

/**
 * Competitions Controller
 *
 * @property \App\Model\Table\CompetitionsTable $Competitions
 *
 * @method \App\Model\Entity\Competition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompetitionsController extends AppController
{

    private $session;
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('LeaguesUsers');
        $this->session = $this->getRequest()->getSession();
        $this->loadComponent('Policy');
    }
    public function getLastUrl()
    {
        return $this->session->read('lastUrl');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('deejee');

        $this->paginate = [
            'contain' => ['Seasons.Leagues', 'Locations', 'Schemes'],
            'order' => ['date' => 'ASC']
        ];

        $activeEvents = $this->Competitions->find('all')->where(['Competitions.status' => '1']);

        $competitions = $this->paginate($activeEvents);
        Time::setDefaultLocale('es-MX');
        $this->set(compact('competitions'));
    }


    /**
     * Manage method
     *
     * @return \Cake\Http\Response|null
     */
    public function manage()
    {
        $Events = $this->Competitions->find('all');
        if ($this->request->getSession()->read('Auth.User.role') == 'organizers') {
            $leagues_id  = $this->LeaguesUsers->getLeaguesByUser($this->request->getSession()->read('Auth.User.id'));
            $Events->where(['Leagues.id IN' => $leagues_id]);
        }
        $this->paginate = [
            'contain' => ['Seasons.Leagues', 'Locations', 'Schemes'],
            'order' => ['date' => 'ASC'],
        ];

        $competitions = $this->paginate($Events);
        Time::setDefaultLocale('es-MX');
        $this->set(compact('competitions'));
    }

    public function join()
    {
        $this->paginate = array(
            'contain' => ['Seasons', 'Locations', 'CompetitionsUsers']
        );
        $ids = $this->CompetitionsUsers->getJoined($this->Auth->user('id'));
        if ($ids) {
            $competitions = $this->paginate($this->Competitions->find()->where(['Competitions.id NOT IN' => $ids]));
        } else {
            $ids = "";
            $competitions = $this->paginate($this->Competitions);
        }
        $competitionsIn = $this->paginate($this->Competitions->find()->where(['Competitions.id IN' => $ids]));
        $this->set(compact('competitions'));
        $this->set(compact('competitionsIn'));
    }

    /**
     * View method
     *
     * @param string|null $id Competition id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('deejee');

        $competition = $this->Competitions->get($id, [
            'contain' => ['Seasons', 'Locations', 'Matches', 'Schemes', 'Seasons.Leagues']
        ]);

        $this->leaguesTable = TableRegistry::get('leagues');
        $leagues = $this->leaguesTable->find('all')
            ->where(['id' => $competition->season->league_id])
            ->contain(['Seasons', 'Seasons.Competitions']);

        $league = $leagues->first();
        $this->set('competition', $competition);
        $this->set('league', $league);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($season_id = null, $league_id = null)
    {
        $competition = $this->Competitions->newEntity();
        if ($this->request->is('post')) {
            if ($competition = $this->Competitions->addCompetitions($this->request->getData())) {
                $this->Flash->success(__('The competition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The competition could not be saved. Please, try again.'));
        }
        $seasons = $this->Competitions->Seasons->find('list', ['limit' => 200]);
        if ($league_id && $league_id != 0) {
            $seasons->where(['league_id' => $league_id]);
        };
        if ($season_id && $season_id != 0) {
            $seasons->where(['id' => $season_id])->first();
        };
        $locations = $this->Competitions->Locations->find('list', ['limit' => 200]);
        $schemes = $this->Competitions->Schemes->find('list', ['limit' => 200]);
        $this->set(compact('competition', 'seasons', 'locations', 'schemes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Competition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $competition = $this->Competitions->get($id, [
            'contain' => ['Seasons']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->Competitions->editCompetitions($competition, $this->request->data)) {
                $this->Flash->success(__('The competition has been saved.'));
                //return $this->redirect( Router::url( $this->getLastUrl(), true ) );
                return $this->redirect(['action' => 'manage']);
            }
            $this->Flash->error(__('The competition could not be saved. Please, try again.'));
        } else {
            $this->session->write([
                'lastUrl' => $this->referer(),
            ]);
        }
        $seasons = $this->Competitions->Seasons->find('list', ['limit' => 200])->where(['league_id' => $competition->season->league_id]);
        $locations = $this->Competitions->Locations->find('list', ['limit' => 200]);
        $schemes = $this->Competitions->Schemes->find('list', ['limit' => 200]);
        $this->set(compact('competition', 'seasons', 'locations', 'schemes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Competition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->request->getSession()->read('Auth.User.role') == 'organizers') {
            $this->Flash->error(__("You can't delete a Competition "));
            return $this->redirect(['action' => 'manage']);
        }
        $this->request->allowMethod(['post', 'delete']);
        $competition = $this->Competitions->get($id);
        if ($this->Competitions->delete($competition)) {
            $this->Flash->success(__('The competition has been deleted.'));
        } else {
            $this->Flash->error(__('The competition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Competition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function myCompetitions($league_id = null, $season_id = 0)
    {
        if ($this->request->getSession()->read('Auth.User.role') == 'organizers') {
            $this->Policy->organizerPolicies([
                'user' => $this->request->getSession()->read('Auth.User.id'),
                'league' => $league_id,
                'season' => $season_id
            ]);
        }
        $leagues_id  = $this->LeaguesUsers->getLeaguesByUser($this->request->getSession()->read('Auth.User.id'));
        $info = $this->LeaguesUsers->Leagues->find('all', ['contain' => ['Seasons.Leagues']])->where(['id IN' => $leagues_id]);
        if ($league_id) {
            $seasons = $this->Competitions->Seasons->find('list', ['limit' => 200])->where(['league_id' => $league_id])->toArray();
            $this->set(compact('league_id', 'seasons'));
            $info = $this->Competitions->find('all')->where(['Leagues.id' => $league_id]);
            $this->paginate = [
                'contain' => ['Seasons.Leagues']
            ];
            if ($season_id != 0) {
                $info->where(['season_id' => $season_id]);
            }
        }
        $info = $this->paginate($info);
        $this->set(compact('info', 'season_id'));
    }

    //Autorizacion hacia las vistas del usuario
    public function isAuthorized($user)
    {
        switch ($this->Auth->user('role')) {
            case 'admin':
                if (in_array($this->request->action, ['index', 'view', 'add', 'edit', 'delete', 'manage'])) {
                    return true;
                }
                break;
            case 'organizers':
                if (in_array($this->request->action, ['index', 'view', 'edit', 'manage', 'add', 'myCompetitions'])) {
                    return true;
                }
                break;
            case 'participant':
                if (in_array($this->request->action, ['index', 'view'])) {
                    return true;
                }
                break;
        }
        return false;
    }

    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->allow(['index', 'view']);
    }
}
