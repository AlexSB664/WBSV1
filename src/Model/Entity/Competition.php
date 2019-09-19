<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Competition Entity
 *
 * @property int $id
 * @property string|null $flyer
 * @property string $name
 * @property \Cake\I18n\FrozenTime $date
 * @property int $season_id
 * @property int $scheme_id
 * @property bool|null $status
 * @property int $location_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Season $season
 * @property \App\Model\Entity\Scheme $scheme
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Match[] $matches
 * @property \App\Model\Entity\User[] $users
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
        'flyer' => true,
        'name' => true,
        'date' => true,
        'season_id' => true,
        'scheme_id' => true,
        'status' => true,
        'location_id' => true,
        'created' => true,
        'modified' => true,
        'season' => true,
        'scheme' => true,
        'location' => true,
        'matches' => true,
        'users' => true,
        'slug' => true
    ];
}
