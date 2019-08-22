<?php
namespace App\Controller;

use App\Controller\AppController;

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
    public function index()
    {
        $this->paginate = [
            'contain' => ['Seasons', 'Localitations']
        ];
        $competitionsUsers = $this->paginate($this->CompetitionsUsers);

        $this->set(compact('competitionsUsers'));
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
            'contain' => ['Seasons', 'Localitations']
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
        $seasons = $this->CompetitionsUsers->Seasons->find('list', ['limit' => 200]);
        $localitations = $this->CompetitionsUsers->Localitations->find('list', ['limit' => 200]);
        $this->set(compact('competitionsUser', 'seasons', 'localitations'));
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
        $seasons = $this->CompetitionsUsers->Seasons->find('list', ['limit' => 200]);
        $localitations = $this->CompetitionsUsers->Localitations->find('list', ['limit' => 200]);
        $this->set(compact('competitionsUser', 'seasons', 'localitations'));
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
