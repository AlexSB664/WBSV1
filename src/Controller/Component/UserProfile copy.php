<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;
use Cake\Database\Expression\QueryExpression;

/**
 * User component
 */
class UserProfile
{
    /**
     * Default configuration.
     * This component is use to get competitions data, how many points the freestyler get at compeititon with coliseum points
     *
     * data estructure
     * flyer
     * date
     * stages
     * season
     * league
     * points
     * coliseum points
     * @var array
     */
    //models
    public $MatchesUsers;
    //data root 
    public $user;
    public $competitions;
    public $matches;
    //data result
    public $competitionsData;
    //stages 
    private $stages = ['Dieciseisavos', 'Octavos', 'Cuartos', 'Semifinal', '3er_lugar', 'Final', 'Ganador'];

    protected $_defaultConfig = [];

    public function __construct($user_id = null)
    {
        $this->user_id = $user_id;
        $this->MatchesUsers =  TableRegistry::get('MatchesUsers');
    }

    public function beforeUpData()
    {
        $this->competitions = $this->MatchesUsers->Matches->Competitions->CompetitionsUsers->find('all', ['contain' => ['Competitions.Seasons.Leagues']])->where(['users_id' => $this->user_id]);
    }
    public function setUpData()
    {
        foreach ($this->competitions as $competition) {

            $id_tmp = $competition->competition->id;
            $matches_tmp = $this->MatchesUsers->find('all', ['contain' => ['Matches']])->matching('Matches.Competitions', function ($q) use ($id_tmp) {
                return $q->where(['Competitions.id' => $id_tmp]);
            })->group(['MatchesUsers.id'])->where(['MatchesUsers.user_id' => $this->user_id]);

            $coliseum_points = 0;
            $this->getPoints($matches_tmp, $coliseum_points);
            $this->calculateColiseumPoints($coliseum_points, $competition->competition);

            $this->competitionsData[] = [
                'competition' => [
                    'id' => $competition->competition->id,
                    'flyer' => $competition->competition->flyer,
                    'date' => $competition->competition->date,
                    'name' => $competition->competition->name
                ],
                'season' => [
                    'id' => $competition->competition->season->id,
                    'name' => $competition->competition->season->name
                ],
                'league' => [
                    'id' => $competition->competition->season->league->id,
                    'name' => $competition->competition->season->league->name
                ],
                'coliseum_points' => $coliseum_points,
            ];
        }
    }

    public function getPoints($matches_tmp, &$coliseum_points)
    {

        foreach ($matches_tmp as $match) {

            if (in_array($match->match->stage, $this->stages)) {
                $coliseum_points += 1;
                if ($match->match->stage === "Final") {
                    //only final stage set 2 points
                    $coliseum_points += 1;
                }
            }
        }
    }

    public function calculateColiseumPoints(&$coliseum_points, $competition)
    {
        $coliseum_points = $coliseum_points *   $competition->bonus *  $competition->season->league->bonus;
    }
    public function make()
    {
        $this->beforeUpData();
        $this->setUpData();
        return $this->competitionsData;
    }
}
