<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\Component\Battles;

/**
 * MatchesUsers Controller
 *
 * @property \App\Model\Table\MatchesUsersTable $MatchesUsers
 *
 * @method \App\Model\Entity\MatchesUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MatchesUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Matches', 'Users']
        ];
        $matchesUsers = $this->paginate($this->MatchesUsers);

        $this->set(compact('matchesUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Matches User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $matchesUser = $this->MatchesUsers->get($id, [
            'contain' => ['Matches', 'Users']
        ]);

        $this->set('matchesUser', $matchesUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $matchesUser = $this->MatchesUsers->newEntity();
        if ($this->request->is('post')) {
            $matchesUser = $this->MatchesUsers->patchEntity($matchesUser, $this->request->getData());
            if ($this->MatchesUsers->save($matchesUser)) {
                $this->Flash->success(__('The matches user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The matches user could not be saved. Please, try again.'));
        }
        $matches = $this->MatchesUsers->Matches->find('list', ['limit' => 200]);
        $users = $this->MatchesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('matchesUser', 'matches', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Matches User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $matchesUser = $this->MatchesUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $matchesUser = $this->MatchesUsers->patchEntity($matchesUser, $this->request->getData());
            if ($this->MatchesUsers->save($matchesUser)) {
                $this->Flash->success(__('The matches user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The matches user could not be saved. Please, try again.'));
        }
        $matches = $this->MatchesUsers->Matches->find('list', ['limit' => 200]);
        $users = $this->MatchesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('matchesUser', 'matches', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Matches User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $matchesUser = $this->MatchesUsers->get($id);
        if ($this->MatchesUsers->delete($matchesUser)) {
            $this->Flash->success(__('The matches user has been deleted.'));
        } else {
            $this->Flash->error(__('The matches user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function listByCompetition($competition_id = null)
    {
        $list = $this->MatchesUsers->find('all',['contain'=>['Matches','Users'],'order'=>['Matches.id','Matches.stage']])->where(['Matches.competition_id'=>$competition_id])->toArray();
        $list =( new Battles(['competition_id'=>$competition_id]))->make();
        $this->set(compact('list'));
    }
}
