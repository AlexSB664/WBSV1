<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Competitions;
use App\Controller\Component\LeaderboardRanking;

/**
 * SeasonsReports Controller
 *
 *
 * @method \App\Model\Entity\SeasonsReport[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LeaderboardController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->leaguesTable = TableRegistry::get('leagues');
        $this->seasonsTable = TableRegistry::get('seasons');
        $this->competitionsTable = TableRegistry::get('competitions');
        $this->matchesTable = TableRegistry::get('matches');
        $this->matches_usersTable = TableRegistry::get('matches_users');
        $this->usersTable = TableRegistry::get('users');
    }

    public function index($league = null, $season = null, $competition = null)
    {
        $this->viewBuilder()->layout('public');

        $leagues = $this->leaguesTable->find('all')
            ->where(['leagues.name' => $league]);

        $leagues = $this->paginate($leagues);

        $this->set(compact('leagues'));
    }

    public function seasons($id = null)
    {
        $this->viewBuilder()->layout('public');

        $seasons = $this->seasonsTable->find()->where(['league_id' => $id]);

        $seasons = $this->paginate($seasons);

        $this->set(compact('seasons'));
    }

    public function competitions($id = null)
    {
        $this->viewBuilder()->layout('public');

        $competitions = $this->competitionsTable->find()->where(['season_id' => $id]);

        $competitions = $this->paginate($competitions);

        $this->set(compact('competitions'));
    }

    public function board($leagues_slug = null, $seasons_slug = null, $competition_slug = null)
    {
        $this->viewBuilder()->layout('public');
        $board = $this->leaguesTable->find();
        if ($leagues_slug) {

            $leagues = $this->leaguesTable->getIdBySlug($leagues_slug);
            $board = $this->seasonsTable->find()->where(['league_id' => $leagues->id]);
            $this->set(compact('leagues'));
            if ($seasons_slug) {
                $seasons = $this->seasonsTable->find()->where(['slug' => $seasons_slug,'league_id' => $leagues->id])->first();
                $competitions = $this->competitionsTable->find('all',['order' => ['date ASC']])->where(['season_id' => $seasons->id]);
                if ($competition_slug === "all") {
                    $board = (new LeaderboardRanking(['league' => $leagues->id, 'season' => $seasons_slug, 'competition' => $competition_slug]))->make();
                } else {
                    $board = (new LeaderboardRanking(['league' => $leagues->id, 'season' => $seasons->slug, 'competition' => $competition_slug]))->make();
                }
                $this->set(compact('seasons_slug'));
                $this->set(compact('competitions'));
                $this->set(compact('competition_slug'));
            }
        }
        $this->set(compact('board'));
    }

    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->allow(['index', 'seasons', 'competitions', 'board']);
    }
}
