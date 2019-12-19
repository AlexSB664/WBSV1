<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Controller\Component\UserProfile;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        if ($this->Auth->user('role') !== 'admin') {
            $this->Flash->error(__("You don't have 
            permissions"));
            return $this->redirect(['controller' => 'Competitions', 'action' => 'index']);
        }
        $this->paginate = [
            'contain' => ['Crews']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Crews', 'Matches']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->Auth->user('role') !== 'admin') {
            $this->Flash->error(__("You don't have 
            permissions"));
            return $this->redirect(['controller' => 'Competitions', 'action' => 'index']);
        }
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $crews = $this->Users->Crews->find('list', ['limit' => 200]);
        $matches = $this->Users->Matches->find('list', ['limit' => 200]);
        $this->set(compact('user', 'crews', 'matches'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($this->Auth->user('role') !== 'admin') {
            $this->Flash->error(__("You don't have 
            permissions"));
            return $this->redirect(['controller' => 'Competitions', 'action' => 'index']);
        }
        $user = $this->Users->get($id, [
            'contain' => ['Matches']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->Users->editParticipan($user, $this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $crews = $this->Users->Crews->find('list', ['limit' => 200]);
        $matches = $this->Users->Matches->find('list', ['limit' => 200]);
        $this->set(compact('user', 'crews', 'matches'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->Auth->user('role') !== 'admin') {
            $this->Flash->error(__("You don't have 
            permissions"));
            return $this->redirect(['controller' => 'Competitions', 'action' => 'index']);
        }
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if (!empty($this->request->getSession()->read('Auth.User.id'))) {
            if (in_array($this->request->getSession()->read('Auth.User.role'), ['admin', 'organizers'])) {
                $this->redirect(['controller' => 'Competitions', 'action' => 'manage']);
            }
            $this->redirect($this->Auth->redirectUrl());
        }
        $this->viewBuilder()->layout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success('Login successful');
                if (in_array($user['role'], ['admin'])) {
                    $this->redirect(['controller' => 'Competitions', 'action' => 'manage']);
                }
                if (in_array($user['role'], ['organizers'])) {
                    $this->redirect(['controller' => 'Matches', 'action' => 'lazyAddV2']);
                }
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('Login failed');
            }
        }
    }

    public function logout()
    {
        $this->Flash->success('Logout successful');
        $this->redirect($this->Auth->logout());
    }

    public function singup()
    {
        $this->viewBuilder()->layout('login');
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            if ($this->Users->addParticipan($this->Auth->user('id'), $this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function profile($id = null,$league_id = null)
    {
        $this->viewBuilder()->layout('deejee');
        $user = $this->Users->get($id, [
            'contain' => ['Crews', 'Matches']
        ]);
        $data = new UserProfile($id,$league_id);
        $data = $data->make();
        $this->set('user', $user);
        $this->set(compact('data'));
    }

    public function isAuthorized($user)
    {
        switch ($this->Auth->user('role')) {
            case 'admin':
                if (in_array($this->request->action, ['index', 'view', 'add', 'edit', 'delete','profile'])) {
                    return true;
                }
                break;
        }
        return false;
    }

    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->allow(['singup', 'logout']);
    }
}
