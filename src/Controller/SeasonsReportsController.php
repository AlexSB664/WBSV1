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
        $this->competitionsTable = TableRegistry::get('competitions');
        $this->matchesTable = TableRegistry::get('matches');
    }

    public function byPoints($id = null)
    {
        $this->paginate = [
            'contain' => ['Seasons']
        ];
    
        $this->competitions = TableRegistry::get('competitions');
        //primero obtenemos todas las competencias dentro de la temporada
        $competitions = $this->competitionsTable->find()->where(['season_id' => $id]);
        //una vez hecho con el id de las competencias traemos los matches
        $matches = $this->paginate($this->matchesTable->find()->where(['Competitions.id IN' => $competitions]));


        foreach($matches as $competition){
            echo ($competition);
        }
        die();
        //ahora conseguimos los combatientes por temporada
        //$compTmp = $competitions->first()->season_id;
    
        $competitions = $this->paginate($this->competitions);
        //$leagues = $this->Leagues->get($competitions->first->competition_id);
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
}
