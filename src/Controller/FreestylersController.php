<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Controller\Component\FreestylersRanking;

/**
 * Freestylers Controller
 *
 *
 * @method \App\Model\Entity\Freestyler[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FreestylersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('FreestylersTops');
        $this->loadModel('FreestylersTopsUsers');
    }
    public function bestOfYear($year = null)
    {
        $this->viewBuilder()->layout('deejee');
        $currentYear = date('Y');
        $calculated = true;
        if ($free = $this->FreestylersTops->find()->where(['id' => (int) date('Y')])->first()) {
            $freestylers_count = $free->count;
            $freestylers = $this->FreestylersTopsUsers->find('all', ['contain' => ['Users']])->where(['FreestylersTopsUsers.freestylers_top_id' => $free->id]);
            $this->paginate = [
                'limit' => 50
            ];
            $freestylers = $this->paginate($freestylers);
            $calculated = false;
        } else {
            $Frees = new FreestylersRanking(['year' => $currentYear]);
            $data = $Frees->make();
            $freestylers =  json_decode(json_encode($data->users_list), FALSE);
            $freestylers_count = $data->users_count;
        }
        $this->set(compact('freestylers', 'freestylers_count', 'calculated'));
    }

    public function save()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $users = unserialize(base64_decode($this->request->getData('data')));
            $users = json_decode(json_encode($users), FALSE);
            $count = $this->request->getData('count');

            if ($this->FreestylersTops->find()->where(['id' => (int) date('Y')])->first()) {
                $this->Flash->error('Ya existe un registro anterior');
                return $this->redirect(['action' => 'bestOfYear']);
            }

            $freeTop = $this->FreestylersTops->newEntity();
            $freeTop->count = $count;
            $freeTop->id = (int) date('Y');
            $this->FreestylersTops->save($freeTop);
            foreach ($users as  $user) {
                $user_info = $this->FreestylersTopsUsers->newEntity();
                $user_info->freestylers_top_id =  $freeTop->id;
                $user_info->user_id = $user->user_id;
                $user_info->points =  $user->points;
                $user_info->position =  $user->position;
                $this->FreestylersTopsUsers->save($user_info);
            }

            $this->Flash->success('Se guardo correctamente');
            return $this->redirect(['action' => 'bestOfYear']);
        }
        die();
    }

    public function discoveryTop()
    {
        $this->viewBuilder()->layout('deejee');
        $this->paginate = [
            'limit' => 1
        ];
        $top_id = (int) date('Y');
        $userTop = $this->FreestylersTopsUsers->find('all', ['contain' => ['Users'], 'order' => [
            'FreestylersTopsUsers.id' => 'DESC',
            'Users.aka' => 'ASC'
        ]])->where(['freestylers_top_id' => $top_id, 'position <=' => 32]);
        $userTop = $this->paginate($userTop);
        $this->set(compact('userTop'));
    }

    public function isAuthorized($user)
    {
        switch ($this->Auth->user('role')) {
            case 'admin':
                return true;
                break;
            case 'organizers':
                if (in_array($this->request->action, ['discoveryTop','bestOfYear'])) {
                    return true;
                }
                break;
        }
        return false;
    }

    // public function beforeFilter(\Cake\Event\Event $event)
    // {
    //     $this->Auth->allow(['bestOfYear']);
    // Notice (8): Undefined property: stdClass::$user_id [APP/Controller/FreestylersController.php, line 63]
    // }
}
