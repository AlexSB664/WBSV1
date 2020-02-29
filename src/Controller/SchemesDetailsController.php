<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * SchemesDetails Controller
 *
 * @property \App\Model\Table\SchemesDetailsTable $SchemesDetails
 *
 * @method \App\Model\Entity\SchemesDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SchemesDetailsController extends AppController
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
        $schemesDetails = $this->SchemesDetails->find('all');
        if ($this->request->getSession()->read('Auth.User.role') == 'organizers') {
            $leagues_id  = $this->LeaguesUsers->getLeaguesByUser($this->request->getSession()->read('Auth.User.id'));
            $schemesDetails->where(['Leagues.id IN' => $leagues_id]);
        }
        $this->paginate = [
            'contain' => ['Schemes.Leagues']
        ];
        $schemesDetails = $this->paginate($schemesDetails);

        $this->set(compact('schemesDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Schemes Detail id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $schemesDetail = $this->SchemesDetails->get($id, [
            'contain' => ['Schemes']
        ]);

        $this->set('schemesDetail', $schemesDetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $schemesDetail = $this->SchemesDetails->newEntity();
        if ($this->request->is('post')) {
            $schemesDetail = $this->SchemesDetails->patchEntity($schemesDetail, $this->request->getData());
            if ($this->SchemesDetails->save($schemesDetail)) {
                $this->Flash->success(__('The schemes detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The schemes detail could not be saved. Please, try again.'));
        }
        $schemes = $this->SchemesDetails->Schemes->find('list', ['limit' => 200]);
        if ($this->request->getSession()->read('Auth.User.role') == 'organizers') {
            $leagues_id  = $this->LeaguesUsers->getLeaguesByUser($this->request->getSession()->read('Auth.User.id'));
            $schemes->where(['league_id IN' => $leagues_id]);
        }
        $this->set(compact('schemesDetail', 'schemes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Schemes Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $schemesDetail = $this->SchemesDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $schemesDetail = $this->SchemesDetails->patchEntity($schemesDetail, $this->request->getData());
            if ($this->SchemesDetails->save($schemesDetail)) {
                $this->Flash->success(__('The schemes detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The schemes detail could not be saved. Please, try again.'));
        }
        $schemes = $this->SchemesDetails->Schemes->find('list', ['limit' => 200]);
        if ($this->request->getSession()->read('Auth.User.role') == 'organizers') {
            $leagues_id  = $this->LeaguesUsers->getLeaguesByUser($this->request->getSession()->read('Auth.User.id'));
            $schemes->where(['league_id IN' => $leagues_id]);
        }
        $this->set(compact('schemesDetail', 'schemes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Schemes Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $schemesDetail = $this->SchemesDetails->get($id);
        if ($this->SchemesDetails->delete($schemesDetail)) {
            $this->Flash->success(__('The schemes detail has been deleted.'));
        } else {
            $this->Flash->error(__('The schemes detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getPoints()
    {
        $this->autoRender = false;
        if ($this->request->is(['get'])) {
            $schemeTmp = $this->SchemesDetails->find('all')->where(['position' => $this->request->query['stage'], 'scheme_id' => $this->request->query['scheme_id']])->first();
            echo ($schemeTmp->points);
        }
    }

    //Autorizacion hacia las vistas del usuario
    public function isAuthorized($user)
    {
        switch ($this->Auth->user('role')) {
            case 'admin':
                if (in_array($this->request->action, ['index', 'view', 'add', 'edit', 'delete', 'getPoints'])) {
                    return true;
                }
                break;
            case 'organizers':
                if (in_array($this->request->action, ['index', 'view', 'add', 'edit', 'getPoints'])) {
                    return true;
                }
                break;
                // case 'participant':
                //     if (in_array($this->request->action, ['index,view'])) {
                //         return true;
                //     }
                //     break;
        }
        return false;
    }
}
