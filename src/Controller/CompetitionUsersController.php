<?php

namespace App\Controller;

use App\Controller\AppController;
use Competitions;

/**
 * CompetitionUsers Controller
 *
 * @property \App\Model\Table\CompetitionUsersTable $CompetitionUsers
 *
 * @method \App\Model\Entity\CompetitionUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompetitionUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function inicialize()
    {
        parent::initialize();
        $this->loadModel('Users');  
        $this->loadModel('Competitions');
    }
    
    public function index($id=0)
    {
        $this->paginate = ['contain' => ['Users']];
        $competitionsUser = $this->CompetitionUsers->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) 
        {
            $competitionsUser = $this->CompetitionUsers->patchEntity($competitionsUser, $this->request->getData());
            $assistance=$_POST['assistance'];
            var_dump($assistance);
            die();
            if ($this->CompetitionUsers->save($competitionsUser)) 
            {
                $this->Flash->success(__('The wing has been saved.'));
            } 
        }
        $this->Flash->error(__('The competition user could not be saved. Please, try again.'));   
        $competitionsUser=$this->paginate($this->CompetitionUsers->find()->where(['competitions_id'=>$id]));
        $this->set(compact('competitionsUser')); 
    }
    /**
     * View method
     *
     * @param string|null $id Competition User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $competitionUser = $this->CompetitionUsers->get($id, [
            'contain' => ['Competitions', 'Users']
        ]);

        $this->set('competitionUser', $competitionUser);
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $competitionUser = $this->CompetitionUsers->newEntity();
        if ($this->request->is('post')) {
            $competitionUser = $this->CompetitionUsers->patchEntity($competitionUser, $this->request->getData());
            if ($this->CompetitionUsers->save($competitionUser)) {
                $this->Flash->success(__('The competition user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The competition user could not be saved. Please, try again.'));
        }
        $competitions = $this->CompetitionUsers->Competitions->find('list', ['limit' => 200]);
        $users = $this->CompetitionUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('competitionUser', 'competitions', 'users'));
    }
    /**
     * Edit method
     *
     * @param string|null $id Competition User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $competitionUser = [
            'contain' => ['Users']
        ];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $competitionUser = $this->CompetitionUsers->patchEntity($competitionUser, $this->request->getData());
            if ($this->CompetitionUsers->save($competitionUser)) {
                $this->Flash->success(__('The competition user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The competition user could not be saved. Please, try again.'));
        }
        $competitions = $this->CompetitionUsers->Competitions->find('list', ['limit' => 200]);
        $users = $this->CompetitionUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('competitionUser', 'competitions', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Competition User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $competitionUser = $this->CompetitionUsers->get($id);
        if ($this->CompetitionUsers->delete($competitionUser)) {
            $this->Flash->success(__('The competition user has been deleted.'));
        } else {
            $this->Flash->error(__('The competition user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
