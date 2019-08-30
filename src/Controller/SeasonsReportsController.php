<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
        $this->loadModel('Users');
    }

    public function index($id = null)
    {
        $this->competitions = TableRegistry::get('competitions');
        $fechas = $this->competitions->newEntity();
        $body = null;

        if ($this->request->is('get')) {
            $compeTmp = $this->competitions->find()
                ->where(['season_id' => $id]);
            foreach ($compeTmp as $compe) {
                echo ("<br>");
                echo ($compe->id);
            }
            die();
        }
        
    }
}
