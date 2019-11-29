<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Schemes Controller
 *
 * @property \App\Model\Table\SchemesTable $Schemes
 *
 * @method \App\Model\Entity\Scheme[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SchemesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('LeaguesUsers');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $schemes=$this->Schemes->find('all');
        $leagues = $this->LeaguesUsers->Leagues->find('list', ['limit' => 200]);
        if ($this->request->getSession()->read('Auth.User.role') == 'organizers') {
            $leagues_id  = $this->LeaguesUsers->getLeaguesByUser($this->request->getSession()->read('Auth.User.id'));
            $schemes->where(['league_id IN' => $leagues_id]);
        }
        $this->paginate = [
            'contain' => ['Leagues']
        ];
        $schemes = $this->paginate($schemes);

        $this->set(compact('schemes'));
    }

    /**
     * View method
     *
     * @param string|null $id Scheme id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $scheme = $this->Schemes->get($id, [
            'contain' => ['Leagues', 'SchemesDetails']
        ]);

        $this->set('scheme', $scheme);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $scheme = $this->Schemes->newEntity();
        if ($this->request->is('post')) {
            $scheme = $this->Schemes->patchEntity($scheme, $this->request->getData());
            if ($this->Schemes->save($scheme)) {
                $this->Flash->success(__('The scheme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scheme could not be saved. Please, try again.'));
        }
        $leagues = $this->LeaguesUsers->Leagues->find('list', ['limit' => 200]);
        if ($this->request->getSession()->read('Auth.User.role') == 'organizers') {
            $leagues_id  = $this->LeaguesUsers->getLeaguesByUser($this->request->getSession()->read('Auth.User.id'));
            $leagues->where(['id IN' => $leagues_id]);
        }
        $this->set(compact('scheme', 'leagues'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Scheme id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $scheme = $this->Schemes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scheme = $this->Schemes->patchEntity($scheme, $this->request->getData());
            if ($this->Schemes->save($scheme)) {
                $this->Flash->success(__('The scheme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scheme could not be saved. Please, try again.'));
        }
        $leagues = $this->LeaguesUsers->Leagues->find('list', ['limit' => 200]);
        if ($this->request->getSession()->read('Auth.User.role') == 'organizers') {
            $leagues_id  = $this->LeaguesUsers->getLeaguesByUser($this->request->getSession()->read('Auth.User.id'));
            $leagues->where(['id IN' => $leagues_id]);
        }
        $this->set(compact('scheme', 'leagues'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Scheme id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $scheme = $this->Schemes->get($id);
        if ($this->Schemes->delete($scheme)) {
            $this->Flash->success(__('The scheme has been deleted.'));
        } else {
            $this->Flash->error(__('The scheme could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

      //Autorizacion hacia las vistas del usuario
  public function isAuthorized($user)
  {
     switch ($this->Auth->user('role')) {
       case 'admin':
         if (in_array($this->request->action, ['index','view', 'add', 'edit', 'delete'])){
           return true;
         }
         break;
       case 'organizers':
       if (in_array($this->request->action, ['index','view','add'])){
             return true;
         }
         break;
    //   case 'participant':
    //      if (in_array($this->request->action, ['index,view'])){
    //          return true;
    //      }
    //      break;
     }
     return false;
  }
}
