<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Matches Controller
 *
 * @property \App\Model\Table\MatchesTable $Matches
 *
 * @method \App\Model\Entity\Match[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MatchesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->CompetitionsUsers = TableRegistry::get('competitions_users');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Competitions']
        ];
        $matches = $this->paginate($this->Matches);

        $this->set(compact('matches'));
    }

    /**
     * View method
     *
     * @param string|null $id Match id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $match = $this->Matches->get($id, [
            'contain' => ['Competitions', 'Users']
        ]);

        $this->set('match', $match);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $match = $this->Matches->newEntity();
        if ($this->request->is('post')) {
            $match = $this->Matches->patchEntity($match, $this->request->getData());
            if ($this->Matches->save($match)) {
                $this->Flash->success(__('The match has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The match could not be saved. Please, try again.'));
        }
        $competitions = $this->Matches->Competitions->find('list', ['limit' => 200]);
        $users = $this->Matches->Users->find('list', ['limit' => 200]);
        $this->set(compact('match', 'competitions', 'users'));
    }

    public function lazyAdd($competition_id = null)
    {
        if ($competition_id ) {
            $match = $this->Matches->newEntity();
            if ($this->request->is('post')) {
                $match = $this->Matches->patchEntity($match, $this->request->getData());
                if ($this->Matches->save($match)) {
                    $this->Flash->success(__('The match has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The match could not be saved. Please, try again.'));
            }
            // $stages = $this->Matches->Competitions->Schemes->SchemesDetails->find('all');
            // echo ($stages);
            // die();
            $competition2 = $this->Matches->Competitions->find('all',['contain' => ['Seasons.Leagues']])->where(['Competitions.id' => $competition_id])->first();
            $competition = $this->Matches->Competitions->find('list')->where(['id' => $competition_id]);
            $usr_id = $this->CompetitionsUsers->getUsersIdByCompetition($competition_id);

            $users = $this->Matches->Users->find('list', ['limit' => 200])->where(['id IN' => $usr_id]);
            $this->set(compact('match', 'competition','competition2', 'users'));
        } else {
            $competitions = $this->Matches->Competitions->find('all', ['contain' => ['Seasons.Leagues']]);
            //$competitions = $this->Matches->Competitions->find();
            $this->set(compact('competitions'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Match id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $match = $this->Matches->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $match = $this->Matches->patchEntity($match, $this->request->getData());
            if ($this->Matches->save($match)) {
                $this->Flash->success(__('The match has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The match could not be saved. Please, try again.'));
        }
        $competitions = $this->Matches->Competitions->find('list');
        $users = $this->Matches->Users->find('list');
        $this->set(compact('match', 'competitions', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Match id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $match = $this->Matches->get($id);
        if ($this->Matches->delete($match)) {
            $this->Flash->success(__('The match has been deleted.'));
        } else {
            $this->Flash->error(__('The match could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
