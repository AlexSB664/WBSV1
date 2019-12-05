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
    public function bestOfYear($year = null)
    {
        $this->viewBuilder()->layout('deejee');
        $currentYear = date('Y');
        // $currentYear = (int) date('Y');
        if ($year) {
            // $currentYear = (int) $year;
        }
        $Frees = new FreestylersRanking(['year' => $currentYear]);
        $data = $Frees->make();
        $freestylers =  $data->users_list;
        $freestylers_count = $data->users_count;
        $this->set(compact('freestylers','freestylers_count'));
    }

    public function isAuthorized($user)
    {
        switch ($this->Auth->user('role')) {
            case 'admin':
                return true;
                break;
        }
        return false;
    }

    // public function beforeFilter(\Cake\Event\Event $event)
    // {
    //     $this->Auth->allow(['bestOfYear']);
    // }
}
