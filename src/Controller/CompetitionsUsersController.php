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
    public function inicialize()
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('Competitions');
    }
    public function index($id = null)
    {
        $this->paginate = ['contain' => ['Users']];
        $competitionsUsers = $this->CompetitionsUsers->find()->where(['competitions_id' => $id]);
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
            $this->redirect($this->referer());
        }
        $this->redirect($this->referer());
    }

    public function unjoin($id = null)
    {
        $competitionsUser = $this->CompetitionsUsers->find()->where([
            'competitions_id' => $id
        ])->first();
        if ($this->CompetitionsUsers->delete($competitionsUser)) {
            $this->Flash->success(__('The competitions user has been deleted.'));
            $this->redirect($this->referer());
        } else {
            $this->Flash->error(__('The competitions user could not be deleted. Please, try again.'));
            $this->redirect($this->referer());
        }
        $this->redirect($this->referer());
    }
    public function Assistance($id = null)
    {
        $this->autoRender = false;
        $competitionsUserTable = TableRegistry::get('CompetitionsUsers');
        $competitionsUserTable = TableRegistry::getTableLocator()->get('CompetitionsUsers');
        $competitionsUser = $competitionsUserTable->get($id);
        if ($competitionsUser->assistance == 1) {
            $competitionsUser->assistance = 0;
        } else {
            $competitionsUser->assistance = 1;
        }
        if ($competitionsUserTable->save($competitionsUser)) {
            $this->redirect($this->referer());
        }
        $this->redirect($this->referer());
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
     * Add  lazy method because QUE HUEVA!!!!
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function lazyAdd()
    {
        $competitionsUser = $this->CompetitionsUsers->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            foreach ($data['users_id'] as $value) {
                $dataTmp = [];
                $dataTmp['competitions_id'] = $data['competitions_id'];
                $dataTmp['users_id'] = $value;
                $dataTmp['assistance'] = $data['assistance'];
                $competitionsTmp = $this->CompetitionsUsers->newEntity();
                $competitionsTmp = $this->CompetitionsUsers->patchEntity($competitionsTmp, $dataTmp);
                if ($this->CompetitionsUsers->save($competitionsTmp)) {
                    $this->Flash->success(__('The competitions user has been saved.'));
                }
                $this->Flash->error(__('The competitions user could not be saved. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
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
