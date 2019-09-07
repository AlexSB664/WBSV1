<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Competitions;

/**
 * Competitions Controller
 *
 * @property \App\Model\Table\CompetitionsTable $Competitions
 *
 * @method \App\Model\Entity\Competition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompetitionsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('CompetitionsUsers');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // if ($this->Auth->user('role') == "participant") {
        //     return $this->redirect(['action' => 'join']);
        // }
        $this->paginate = [
            'contain' => ['Seasons', 'Locations','Schemes']
        ];
        $competitions = $this->paginate($this->Competitions);

        $this->set(compact('competitions'));
    }

    public function join(){
        $this->paginate = array(
            'contain' => ['Seasons', 'Locations', 'CompetitionsUsers']
        );
        $ids = $this->CompetitionsUsers->getJoined($this->Auth->user('id'));
        if($ids){
            $competitions = $this->paginate($this->Competitions->find()->where(['Competitions.id NOT IN' => $ids])); 
        }else{
            $ids= ""; 
            $competitions = $this->paginate($this->Competitions); 
        }
        $competitionsIn = $this->paginate($this->Competitions->find()->where(['Competitions.id IN' => $ids]));
        $this->set(compact('competitions'));
        $this->set(compact('competitionsIn'));
    }

    /**
     * View method
     *
     * @param string|null $id Competition id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $competition = $this->Competitions->get($id, [
            'contain' => ['Seasons', 'Locations', 'Matches','Schemes']
        ]);

        $this->set('competition', $competition);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $competition = $this->Competitions->newEntity();
        if ($this->request->is('post')) {
            if ($competition = $this->Competitions->addCompetitions($this->request->getData())) {
                $this->Flash->success(__('The competition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The competition could not be saved. Please, try again.'));
        }
        $seasons = $this->Competitions->Seasons->find('list', ['limit' => 200]);
        $locations = $this->Competitions->Locations->find('list', ['limit' => 200]);
        $schemes = $this->Competitions->Schemes->find('list',['limit'=>200]);
        $this->set(compact('competition', 'seasons', 'locations','schemes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Competition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $competition = $this->Competitions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $competition = $this->Competitions->patchEntity($competition, $this->request->getData());
            if ($this->Competitions->save($competition)) {
                $this->Flash->success(__('The competition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The competition could not be saved. Please, try again.'));
        }
        $seasons = $this->Competitions->Seasons->find('list', ['limit' => 200]);
        $locations = $this->Competitions->Locations->find('list', ['limit' => 200]);
        $schemes = $this->Competitions->Schemes->find('list',['limit'=>200]);
        $this->set(compact('competition', 'seasons', 'locations','schemes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Competition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $competition = $this->Competitions->get($id);
        if ($this->Competitions->delete($competition)) {
            $this->Flash->success(__('The competition has been deleted.'));
        } else {
            $this->Flash->error(__('The competition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
