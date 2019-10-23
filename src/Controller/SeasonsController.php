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
        $this->paginate = [
            'contain' => ['Leagues']
        ];
        $seasons = $this->paginate($this->Seasons);

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
    public function add()
    {
        $season = $this->Seasons->newEntity();
        if ($this->request->is('post')) {
            if ($season = $this->Seasons->addSeason($this->request->getData())) {
                $this->Flash->success(__('The season has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The season could not be saved. Please, try again.'));
        }
        $leagues = $this->Seasons->Leagues->find('list', ['limit' => 200]);
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
        $season = $this->Seasons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
           /* $season = $this->Seasons->patchEntity($season, $this->request->getData());
            if ($this->Seasons->save($season)) { */
        if ($this->Seasons->editSeason($season, $this->request->data))
            {
                $this->Flash->success(__('The season has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The season could not be saved. Please, try again.'));
        }
        $leagues = $this->Seasons->Leagues->find('list', ['limit' => 200]);
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
                   if (in_array($this->request->action, ['index,view'])) {
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
