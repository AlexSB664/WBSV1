<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * CompetitionsUsers Controller
 *
 * @property \App\Model\Table\CompetitionsUsersTable $CompetitionsUsers
 *
 * @method \App\Model\Entity\CompetitionsUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompetitionsUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Competitions', 'Users']
        ];
        $competitionsUsers = $this->paginate($this->CompetitionsUsers);

        $this->set(compact('competitionsUsers'));
    }

    public function join($id = null)
    {
        $this->autoRender = false;
        $competitionsUserTable = TableRegistry::get('CompetitionsUsers');
        $competitionsUserTable = TableRegistry::getTableLocator()->get('CompetitionsUsers');
        $competitionUser = $competitionsUserTable->newEntity();
        $competitionUser->users_id = $this->Auth->user('id');
        $competitionUser->competitions_id = $id;

        if ($competitionsUserTable->save($competitionUser)) {
            $this->Flash->success(__('The competition user has been saved.'));
        }
        $this->Flash->error(__('The competition user could not be saved. Please, try again.'));    
    }


    /**
     * View method
     *
     * @param string|null $id Competitions User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $competitionsUser = $this->CompetitionsUsers->get($id, [
            'contain' => ['Competitions', 'Users']
        ]);

        $this->set('competitionsUser', $competitionsUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $competitionsUser = $this->CompetitionsUsers->newEntity();
        if ($this->request->is('post')) {
            $competitionsUser = $this->CompetitionsUsers->patchEntity($competitionsUser, $this->request->getData());
            if ($this->CompetitionsUsers->save($competitionsUser)) {
                $this->Flash->success(__('The competitions user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The competitions user could not be saved. Please, try again.'));
        }
        $competitions = $this->CompetitionsUsers->Competitions->find('list', ['limit' => 200]);
        $users = $this->CompetitionsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('competitionsUser', 'competitions', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Competitions User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $competitionsUser = $this->CompetitionsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $competitionsUser = $this->CompetitionsUsers->patchEntity($competitionsUser, $this->request->getData());
            if ($this->CompetitionsUsers->save($competitionsUser)) {
                $this->Flash->success(__('The competitions user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The competitions user could not be saved. Please, try again.'));
        }
        $competitions = $this->CompetitionsUsers->Competitions->find('list', ['limit' => 200]);
        $users = $this->CompetitionsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('competitionsUser', 'competitions', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Competitions User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $competitionsUser = $this->CompetitionsUsers->get($id);
        if ($this->CompetitionsUsers->delete($competitionsUser)) {
            $this->Flash->success(__('The competitions user has been deleted.'));
        } else {
            $this->Flash->error(__('The competitions user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
