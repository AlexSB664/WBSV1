<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Seasons Controller
 *
 * @property \App\Model\Table\SeasonsTable $Seasons
 *
 * @method \App\Model\Entity\Season[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SeasonsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('LeaguesUsers');
        $this->loadComponent('Policy');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $season = $this->Seasons->find('all');
        if ($this->request->getSession()->read('Auth.User.role') == 'organizers') {
            $leagues_id  = $this->LeaguesUsers->getLeaguesByUser($this->request->getSession()->read('Auth.User.id'));
            $season->where(['Leagues.id IN' => $leagues_id]);
        }
        $this->paginate = [
            'contain' => ['Leagues']
        ];
        $seasons = $this->paginate($season);

        $this->set(compact('seasons'));
    }

    /**
     * View method
     *
     * @param string|null $id Season id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $season = $this->Seasons->get($id, [
            'contain' => ['Leagues', 'Competitions']
        ]);

        $this->set('season', $season);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($league_id = null)
    {
        if ($this->request->is('post')) {
            if ($season = $this->Seasons->addSeason($this->request->getData())) {
                $this->Flash->success(__('The season has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The season could not be saved. Please, try again.'));
        }
        $leagues = $this->Seasons->Leagues->find('list', ['limit' => 200]);
        $season = $this->Seasons->newEntity();
        if ($this->request->getSession()->read('Auth.User.role') == 'organizers') {
            $leagues_id  = $this->LeaguesUsers->getLeaguesByUser($this->request->getSession()->read('Auth.User.id'));
            $leagues->where(['id IN' => $leagues_id]);
        }
        $league_id ? $leagues->where(['id' => $league_id])->first() : '';
        $this->set(compact('season', 'leagues'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Season id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Policy->organizerPolicies([
            'season' => $id,
            'controller' => $this,
            'action' => 'mySeasons'
        ]);
        $season = $this->Seasons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            if ($this->Seasons->editSeason($season, $this->request->data)) {
                $this->Flash->success(__('The season has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The season could not be saved. Please, try again.'));
        }
        $leagues = $this->Seasons->Leagues->find('list', ['limit' => 200]);
        if ($this->request->getSession()->read('Auth.User.role') == 'organizers') {
            $leagues_id  = $this->LeaguesUsers->getLeaguesByUser($this->request->getSession()->read('Auth.User.id'));
            $leagues->where(['id IN' => $leagues_id]);
        }
        $this->set(compact('season', 'leagues'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Season id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $season = $this->Seasons->get($id);
        if ($this->Seasons->delete($season)) {
            $this->Flash->success(__('The season has been deleted.'));
        } else {
            $this->Flash->error(__('The season could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function mySeasons($league_id = null)
    {
        $leagues_id  = $this->LeaguesUsers->getLeaguesByUser($this->request->getSession()->read('Auth.User.id'));
        $info = $this->LeaguesUsers->Leagues->find('all', ['contain' => ['Seasons.Leagues']])->where(['id IN' => $leagues_id]);
        if ($league_id) {
            $this->Policy->organizerPolicies([
                'league' => $league_id,
                'controller' => $this,
                'action' => 'mySeasons'
            ]);

            $this->set(compact('league_id', 'seasons'));
            $info = $this->Seasons->find('all')->where(['Leagues.id' => $league_id]);
            $this->paginate = [
                'contain' => ['Leagues']
            ];
        }
        $info = $this->paginate($info);
        $this->set(compact('info', 'season_id'));
    }

    //Autorizacion hacia las vistas del usuario
    public function isAuthorized($user)
    {
        switch ($this->Auth->user('role')) {
            case 'admin':
                if (in_array($this->request->action, ['index', 'view', 'add', 'edit', 'delete'])) {
                    return true;
                }
                break;
            case 'organizers':
                if (in_array($this->request->action, ['add', 'index', 'view', 'edit', 'mySeasons'])) {
                    return true;
                }
                break;
                //    case 'participant':
                //        if (in_array($this->request->action, ['index,view'])) {
                //            return true;
                //        }
                //        break;
        }
        return false;
    }
}
