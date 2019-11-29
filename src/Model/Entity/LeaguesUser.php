<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LeaguesUser Entity
 *
 * @property int $id
 * @property int $league_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\League $league
 * @property \App\Model\Entity\User $user
 */
class LeaguesUser extends Entity
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
        'league_id' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'league' => true,
        'user' => true
    ];
}
