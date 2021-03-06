<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Leagues Controller
 *
 * @property \App\Model\Table\LeaguesTable $Leagues
 *
 * @method \App\Model\Entity\League[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LeaguesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('LeaguesUsers');
        $this->loadComponent('Policy');
    }

    public $paginate = [
        'limit' => 50
    ];

    public function index()
    {
        $this->viewBuilder()->layout('deejee');
        $leagues = $this->paginate($this->Leagues->find('all', [
            'order' => ['Leagues.name' => 'ASC']
        ]));

        $this->set(compact('leagues'));
    }
    /**
     * Manage method
     *
     * @return \Cake\Http\Response|null
     */
    public function manage()
    {
        $leagues = $this->Leagues->find('all');
        if ($this->request->getSession()->read('Auth.User.role') == 'organizers') {
            $leagues_id  = $this->LeaguesUsers->getLeaguesByUser($this->request->getSession()->read('Auth.User.id'));
            $leagues->where(['id IN' => $leagues_id]);
        }
        $leagues = $this->paginate($leagues);
        $this->set(compact('leagues'));
    }


    /**
     * View method
     *
     * @param string|null $id League id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $this->viewBuilder()->layout('deejee');

        $leagues = $this->Leagues->find('all')
            ->where(['Leagues.slug' => $slug])
            ->contain(['Schemes', 'Seasons.Competitions']);
        $league = $leagues->first();
        $league->seasons = array_reverse($league->seasons);
        $this->set('league', $league);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $league = $this->Leagues->newEntity();
        if ($this->request->is('post')) {
            if ($league = $this->Leagues->addLeague($this->request->getData())) {
                $this->Flash->success(__('The league has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The league could not be saved. Please, try again.'));
        }
        $this->set(compact('league'));
    }

    /**
     * Edit method
     *
     * @param string|null $id League id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Policy->organizerPolicies([
            'league' => $id,
            'controller' => $this,
            'action' => 'myLeagues'
        ]);
        $league = $this->Leagues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->Leagues->editLeague($league, $this->request->data)) {
                $this->Flash->success(__('The league has been saved.'));

                return $this->redirect(['action' => 'manage']);
            }
            $this->Flash->error(__('The league could not be saved. Please, try again.'));
        }
        $this->set(compact('league'));
    }

    /**
     * Delete method
     *
     * @param string|null $id League id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $league = $this->Leagues->get($id);
        if ($this->Leagues->delete($league)) {
            $this->Flash->success(__('The league has been deleted.'));
        } else {
            $this->Flash->error(__('The league could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function setCompetition($id = null, $competition_id = null)
    {
        if (!$this->request->query()) {
            $league = $this->Leagues->get($id);
            $league->active_competition = $competition_id;
            if ($this->Leagues->save($league)) {
                $this->Flash->success("La Jornada fue fijada correctamente");
            } else {
                $this->Flash->error("No se pudo fijar la Jornada intentalo mas tarde.");
            }
            return $this->redirect($this->referer());
        }
    }

    public function myLeagues()
    {
        $leagues_id  = $this->LeaguesUsers->getLeaguesByUser($this->request->getSession()->read('Auth.User.id'));
        $info = $this->paginate($this->LeaguesUsers->Leagues->find('all', ['contain' => ['Seasons.Leagues']])->where(['id IN' => $leagues_id]));
        $this->set(compact('info'));
    }


    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->allow(['index', 'view']);
    }

    //Autorizacion hacia las vistas del usuario
    public function isAuthorized($user)
    {
        switch ($this->Auth->user('role')) {
            case 'admin':
                if (in_array($this->request->action, ['index', 'manage', 'view', 'add', 'edit', 'delete', 'setCompetition'])) {
                    return true;
                }
                break;
            case 'organizers':
                if (in_array($this->request->action, ['index', 'view', 'manage', 'edit', 'setCompetition', 'myLeagues'])) {
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
}
