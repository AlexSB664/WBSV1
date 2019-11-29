<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * LeaguesUsers Controller
 *
 * @property \App\Model\Table\LeaguesUsersTable $LeaguesUsers
 *
 * @method \App\Model\Entity\LeaguesUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LeaguesUsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Leagues', 'Users']
        ];
        $leaguesUsers = $this->paginate($this->LeaguesUsers);

        $this->set(compact('leaguesUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Leagues User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $leaguesUser = $this->LeaguesUsers->get($id, [
            'contain' => ['Leagues', 'Users']
        ]);

        $this->set('leaguesUser', $leaguesUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $leaguesUser = $this->LeaguesUsers->newEntity();
        if ($this->request->is('post')) {
            $leaguesUser = $this->LeaguesUsers->patchEntity($leaguesUser, $this->request->getData());
            $userTmp = $this->Users->get($leaguesUser->user_id);
            $userTmp->role = "organizers";
            if (empty($this->LeaguesUsers->find()->where(['league_id' => $leaguesUser->league_id, 'user_id' => $leaguesUser->user_id])->toArray())) {
                $this->Users->save($userTmp);
                if ($this->LeaguesUsers->save($leaguesUser)) {
                    $this->Flash->success(__('The leagues user has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('The leagues user could not be saved. Please, try again.'));
        }
        $leagues2 = $this->LeaguesUsers->Leagues->find('list');
        $users2 = $this->LeaguesUsers->Users->find('list');
        $leagues = $this->LeaguesUsers->Leagues->find('all', ['limit' => 10]);
        $users = $this->LeaguesUsers->Users->find('all', ['limit' => 10]);

        $this->set(compact('leaguesUser', 'leagues', 'users', 'leagues2', 'users2'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Leagues User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $leaguesUser = $this->LeaguesUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $leaguesUser = $this->LeaguesUsers->patchEntity($leaguesUser, $this->request->getData());
            if ($this->LeaguesUsers->save($leaguesUser)) {
                $this->Flash->success(__('The leagues user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The leagues user could not be saved. Please, try again.'));
        }
        $leagues = $this->LeaguesUsers->Leagues->find('list', ['limit' => 200]);
        $users = $this->LeaguesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('leaguesUser', 'leagues', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Leagues User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $leaguesUser = $this->LeaguesUsers->get($id);
        if ($this->LeaguesUsers->delete($leaguesUser)) {
            $this->Flash->success(__('The leagues user has been deleted.'));
        } else {
            $this->Flash->error(__('The leagues user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        switch ($this->Auth->user('role')) {
            case 'admin':
                return true;
                break;
        }
        return false;
    }
}
