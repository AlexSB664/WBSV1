<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Competition Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $date
 * @property int $season_id
 * @property bool|null $status
 * @property int $location_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $scheme_id
 * @property string $name
 *
 * @property \App\Model\Entity\Season $season
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Scheme $scheme
 * @property \App\Model\Entity\Match[] $matches
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\CompetitionsUser $competitions_user
 */
class Competition extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'season_id' => true,
        'status' => true,
        'location_id' => true,
        'created' => true,
        'modified' => true,
        'scheme_id' => true,
        'name' => true,
        'season' => true,
        'location' => true,
        'scheme' => true,
        'matches' => true,
        'users' => true,
        'competitions_user' => true
    ];
}
