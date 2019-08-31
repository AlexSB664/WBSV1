<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Competitions;

/**
 * SeasonsReports Controller
 *
 *
 * @method \App\Model\Entity\SeasonsReport[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SeasonsReportsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Competitions');
        $this->loadModel('Leagues');
        $this->loadModel('Users');
        $this->loadModel('CompetitionsUsers');
    }

    public function index($id = null)
    {
        $this->paginate = [
            'contain' => ['Seasons']
        ];

        $this->competitions = TableRegistry::get('competitions');
        //primero obtenemos todas las competencias dentro de la temporada
        $competitions = $this->competitions->find()->where(['season_id' => $id]);
        //ahora conseguimos los combatientes por temporada
        $compTmp = $competitions->first()->season_id;

        $competitions = $this->paginate($this->competitions);
        //$leagues = $this->Leagues->get($competitions->first->competition_id);
        $this->set(compact('competitions'));
    }
}
