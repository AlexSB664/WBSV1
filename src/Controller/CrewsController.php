<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Crews Controller
 *
 * @property \App\Model\Table\CrewsTable $Crews
 *
 * @method \App\Model\Entity\Crew[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CrewsController extends AppController
{
    public function initialize()
    {
    $this->loadComponent('Flash');
    $this->loadComponent('Auth', [
        'authorize' => ['Controller'] // Added this line
        ]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $crews = $this->paginate($this->Crews);

        $this->set(compact('crews'));
    }

    /**
     * View method
     *
     * @param string|null $id Crew id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $crew = $this->Crews->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('crew', $crew);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $crew = $this->Crews->newEntity();
        if ($this->request->is('post')) {
            $crew = $this->Crews->patchEntity($crew, $this->request->getData());
            if ($this->Crews->save($crew)) {
                $this->Flash->success(__('The crew has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The crew could not be saved. Please, try again.'));
        }
        $this->set(compact('crew'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Crew id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $crew = $this->Crews->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $crew = $this->Crews->patchEntity($crew, $this->request->getData());
            if ($this->Crews->save($crew)) {
                $this->Flash->success(__('The crew has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The crew could not be saved. Please, try again.'));
        }
        $this->set(compact('crew'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Crew id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $crew = $this->Crews->get($id);
        if ($this->Crews->delete($crew)) {
            $this->Flash->success(__('The crew has been deleted.'));
        } else {
            $this->Flash->error(__('The crew could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
       switch ($this->Auth->user('role')) {
         case 'admin':
           if (in_array($this->request->action, ['index','view', 'add', 'edit', 'delete'])){
             return true;
           }
           break;
         case 'organizers':
         if (in_array($this->request->action, ['index,view'])){
               return true;
           }
           break;
        // case 'participant':
        //    if (in_array($this->request->action, ['index,view'])){
        //        return true;
        //    }
        //    break;
       }
       return false;
    }
    
}
