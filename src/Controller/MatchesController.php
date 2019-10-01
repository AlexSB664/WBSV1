<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Routing\Router;

/**
 * Matches Controller
 *
 * @property \App\Model\Table\MatchesTable $Matches
 *
 * @method \App\Model\Entity\Match[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MatchesController extends AppController
{
    private $session;
    public function initialize()
    {
        parent::initialize();
        $this->CompetitionsUsers = TableRegistry::get('competitions_users');
        $this->Leagues = TableRegistry::get('leagues');
        $this->Seasons = TableRegistry::get('seasons');
        $this->Competitions = TableRegistry::get('competitions');
        $this->session = $this->getRequest()->getSession();
    }
    public function getLastUrl()
    {
        return $this->session->read('lastUrl');
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
        if ($competition_id) {
            $match = $this->Matches->newEntity();
            if ($this->request->is('post')) {
                $match = $this->Matches->patchEntity($match, $this->request->getData());
                if ($this->Matches->save($match)) {
                    $this->Flash->success(__('The match has been saved.'));
                    //return $this->redirect(['action' => 'index']);
                    return $this->redirect(Router::url($this->getLastUrl(), true));
                }
                $this->Flash->error(__('The match could not be saved. Please, try again.'));
            } else {
                $this->session->write([
                    'lastUrl' => $this->referer(),
                ]);
            }
            $details = $this->Matches->Competitions->find('all', ['contain' => ['Schemes.SchemesDetails']])->where(['Competitions.id' => $competition_id])->first();
            $stages[] = "";
            foreach ($details->scheme->schemes_details as $detail) {
                $stages[$detail->position] = $detail->position;
            }
            $competition2 = $this->Matches->Competitions->find('all', ['contain' => ['Seasons.Leagues', 'Schemes.SchemesDetails']])->where(['Competitions.id' => $competition_id])->first();
            $competition = $this->Matches->Competitions->find('list')->where(['id' => $competition_id]);
            $usr_id = $this->CompetitionsUsers->getUsersIdByCompetition($competition_id);

            $users = $this->Matches->Users->find('list', ['limit' => 200])->where(['id IN' => $usr_id]);
            $this->set(compact('match', 'competition', 'competition2', 'users', 'stages'));
        } else {
            $competitions = $this->Matches->Competitions->find('all', ['contain' => ['Seasons.Leagues']]);
            //$competitions = $this->Matches->Competitions->find();
            $this->set(compact('competitions'));
        }
    }

    public function lazyAddV2($league_id = null, $season_id = null, $competition_id = null)
    {
        $list = $this->Leagues->find();
        if ($league_id) {
            $this->set(compact('league_id'));
            $list = $this->Seasons->find()->where(['league_id' => $league_id]);
            if ($season_id) {
                $this->set(compact('season_id'));
                $list = $this->Competitions->find()->where(['season_id' => $season_id]);
                if ($competition_id) {
                    $competition_id = $this->Competitions->get($competition_id, ['contain' => ['Seasons.Leagues']]);
                    $this->set(compact('competition_id'));
                }
            }
        }
        $this->set(compact('list'));
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
