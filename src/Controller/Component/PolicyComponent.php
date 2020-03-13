<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;

/**
 * Policy component
 */
class PolicyComponent extends Component
{
    public function __construct()
    {
        $this->LeaguesUsers = TableRegistry::get('LeaguesUsers');
        $this->Competitions = TableRegistry::get('Competitions');
        $this->Seasons = TableRegistry::get('Seasons');
    }
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function organizerPolicies($data = [])
    {
        $this->controller = $data['controller'];
        $data= $data+['competition' => null, 'season' => null, 'league' => null];
        $user = $this->LeaguesUsers->Users->get($this->controller->request->getSession()->read('Auth.User.id'));
        if ($user->role == 'organizers') {
            $this->controller = $data['controller'];
            $this->action = $data['action'];
            $leagues = $this->LeaguesUsers->getLeaguesByUser($user->id);

            if ($data['competition']) {
                $this->reject(
                    $this->competitionManage($data['competition'], $leagues),
                    'You do not have permissions to view this competition'
                );
            } elseif ($data['season']) {
                $this->reject(
                    $this->seasonManage($data['season'], $leagues),
                    'You do not have permissions to view this season'
                );
            } elseif ($data['league']) {
                $this->reject(
                    $this->leagueManage($data['league'], $leagues),
                    'You do not have permissions to view this league'
                );
            }
        }
    }

    public function leagueManage($league, $leagues)
    {
        return in_array($league, $leagues);
    }
    public function seasonManage($season, $leagues)
    {
        return in_array(
            $this->Seasons->get($season, [
                'contain' => ['Leagues']
            ])->league->id,
            $leagues
        );
    }
    public function competitionManage($competition, $leagues)
    {
        return in_array(
            $this->Competitions->get($competition, [
                'contain' => ['Seasons.Leagues']
            ])->season->league->id,
            $leagues
        );
    }

    public function reject($condition, $message)
    {
        if (!$condition) {
            $this->controller->Flash->error(__($message));
            if ($this->action == 'previus') {
                return $this->controller->redirect($this->controller->referer());
            }
            return $this->controller->redirect(['action' => $this->action]);
        }
    }
}
