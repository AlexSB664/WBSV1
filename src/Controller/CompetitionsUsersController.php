<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

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
    private $session;
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('Competitions');
        $this->session = $this->getRequest()->getSession();
        $this->loadComponent('Policy');
        $this->loadComponent('CompetitionUsersResolve', [
            'className' => '\App\Controller\Component\Resolve\CompetitionUsersResolveComponent'
        ]);
    }
    public function getLastUrl()
    {
        return $this->session->read('lastUrl');
    }
    public function index($competition_id = null)
    {
        $this->Policy->organizerPolicies([
            'competition' => $competition_id,
            'controller' => $this,
            'action' => 'previus'
        ]);
        $this->paginate = ['contain' => ['Users']];
        $competitionsUsers = $this->paginate($this->CompetitionsUsers->find()->where(['competitions_id' => $competition_id]));
        $this->set(compact('competitionsUsers'));
    }
    public function join($id = null)
    {
        $this->autoRender = false;
        $competitionUser = $this->CompetitionsUsers->newEntity();
        $competitionUser->users_id = $this->Auth->user('id');
        $competitionUser->competitions_id = $id;

        if ($this->CompetitionsUsers->save($competitionUser)) {
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
    public function assistance($id = null)
    {
        $this->autoRender = false;
        $competitionsUser = $this->CompetitionsUsers->get($id);
        if ($competitionsUser->assistance == 1) {
            $competitionsUser->assistance = 0;
        } else {
            $competitionsUser->assistance = 1;
        }
        if ($this->CompetitionsUsers->save($competitionsUser)) {
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
    public function lazyAdd($competition_id = null)
    {
        $this->Policy->organizerPolicies([
            'competition' => $competition_id,
            'controller' => $this,
            'action' => 'previus'
        ]);
        $competitionsUser = $this->CompetitionsUsers->newEntity();
        if ($this->request->is('post')) {
            $this->CompetitionUsersResolve->resolveLazyAdd($this);
        } else {
            $this->session->write([
                'lastUrl' => $this->referer()
            ]);
        }
        $competition = $this->CompetitionsUsers->Competitions->get($competition_id);
        $users = $this->CompetitionsUsers->Users->find('list');
        $this->set(compact('competitionsUser', 'competition', 'users'));
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
        $this->request->allowMethod(['post', 'delete', 'get']);
        $competitionsUser = $this->CompetitionsUsers->get($id);
        if ($this->CompetitionsUsers->delete($competitionsUser)) {
            $this->Flash->success(__('The competitions user has been deleted.'));
        } else {
            $this->Flash->error(__('The competitions user could not be deleted. Please, try again.'));
        }
        $this->redirect($this->referer());
    }

    public function lazyDelete($competition_id = null)
    {
        $this->Policy->organizerPolicies([
            'competition' => $competition_id,
            'controller' => $this,
            'action' => 'previus'
        ]);
        $this->paginate = ['contain' => ['Users']];
        $competitionsUsers = $this->paginate($this->CompetitionsUsers->find()->where(['competitions_id' => $competition_id]));
        $this->set(compact('competitionsUsers'));
    }

    public function qr($competition_id)
    {
        $this->viewBuilder()->autoLayout(false);
        $this->set(compact('competition_id'));
    }

    public function joinWithQR()
    {
        if (!$this->request->query() || empty($this->request->query('user_id')) || empty($this->request->query('competition_id'))) {
            die();
        }
        $compUsr = $this->CompetitionsUsers->newEntity();
        $compUsr->users_id = $this->request->query('user_id');
        $compUsr->competitions_id = $this->request->query('competition_id');
        $compUsr->assistance = 1;
        $previus =  $this->CompetitionsUsers->find()->where([
            'competitions_id' => $this->request->query('competition_id'),
            'users_id' => $this->request->query('user_id')
        ])->toArray();
        $response = [
            'message' => "El usuario ya esta suscrito a este evento",
            'icon' => 'error',
            'title' => 'Ops...'
        ];
        if (!$previus) {
            $response['message'] = "Error no se pudo suscribir al freestyler";
            if ($this->CompetitionsUsers->save($compUsr)) {
                $response['message'] = "Se suscribio correctamente al freestyler";
                $response['icon'] = "succes";
                $response['title'] = "Suscrito!!";
            }
        }
        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response))
            ->withStatus(200);
    }

    public function isAuthorized($user)
    {
        switch ($this->Auth->user('role')) {
            case 'admin':
                if (in_array($this->request->action, ['index', 'view', 'add', 'edit', 'delete', 'getLastUrl', 'join', 'unjoin', 'assistance', 'lazyAdd', 'lazyDelete', 'qr', 'joinWithQR'])) {
                    return true;
                }
                break;
            case 'organizers':
                if (in_array($this->request->action, ['index', 'view', 'assistance', 'qr', 'joinWithQR', 'lazyAdd', 'lazyDelete'])) {
                    return true;
                }
                break;
                // case 'participant':
                //     if (in_array($this->request->action, ['index,view','join','unjoin'])) {
                //         return true;
                //     }
                //     break;
        }
        return false;
    }
}
