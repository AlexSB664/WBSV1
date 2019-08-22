<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Season Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $league_id
 * @property bool|null $status
 * @property \Cake\I18n\FrozenTime $date_start
 * @property \Cake\I18n\FrozenTime|null $date_end
 *
 * @property \App\Model\Entity\League $league
 * @property \App\Model\Entity\CompetitionsUser[] $competitions_users
 */
class Season extends Entity
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
        'name' => true,
        'description' => true,
        'league_id' => true,
        'status' => true,
        'date_start' => true,
        'date_end' => true,
        'league' => true,
        'competitions_users' => true
    ];
}
