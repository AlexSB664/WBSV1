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
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'] // Added this line
        ]);
        $this->loadComponent('Paginator');
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
        $leagues = $this->paginate($this->Leagues);
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

    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->allow(['index', 'view']);
    }

    //Autorizacion hacia las vistas del usuario
    public function isAuthorized($user)
    {
        switch ($this->Auth->user('role')) {
            case 'admin':
                if (in_array($this->request->action, ['index', 'manage', 'view', 'add', 'edit', 'delete'])) {
                    return true;
                }
                break;
            case 'organizers':
                if (in_array($this->request->action, ['index,view'])) {
                    return true;
                }
                break;
            case 'participant':
                if (in_array($this->request->action, ['index,view'])) {
                    return true;
                }
                break;
        }
        return false;
    }
}
