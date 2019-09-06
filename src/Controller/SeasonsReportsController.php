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
        $this->loadModel('Matches');
        $this->competitionsTable = TableRegistry::get('competitions');
        $this->matchesTable = TableRegistry::get('matches');
        $this->matches_usersTable = TableRegistry::get('matches_users');
        $this->usersTable = TableRegistry::get('users');
    }

    public function byPoints($id = null)
    {
        $this->paginate = [
            'contain' => ['Seasons']
        ];
        //primero obtenemos todas las competencias dentro de la temporada
        $competitions = $this->competitionsTable->find()->where(['season_id'=>$id]);
        $competitionsid = $this->competitionsTable->getId($competitions);
        //una vez hecho con el id de las competencias traemos los matches
        $matches = $this->matchesTable->find()->where(['competition_id IN'=>$competitionsid]);
        $mtchs_points = $matches->select(['points']);
        $matchesid = $this->matchesTable->getId($matches);
        //una vez traemos los combates que tuvieron cada usuario
        $matches_users = $this->matches_usersTable->find()->where(['match_id IN' => $matchesid]);
        
        foreach($mtchs_points as $points){
            echo ($points->points.",");
        }
        echo implode($mtchs_points->toArray());

        die();
        $idUsers = $this->matches_usersTable->getIdUsers($matches_users);
        //traemos cada usuario
        $users = $this->usersTable->find()->where(['id IN' => $idUsers]);

        $this->set(compact('competitions','users'));
        //traer a todos los usuarios
        
        //$leagues = $this->Leagues->get($competitions->first->competition_id);
        //$this->set(compact('competitions'));
    }
}
