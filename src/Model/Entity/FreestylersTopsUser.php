<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FreestylersTopsUser Entity
 *
 * @property int $id
 * @property int $freestylers_top_id
 * @property int $user_id
 * @property int $position
 * @property int $points
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\FreestylersTop $freestylers_top
 * @property \App\Model\Entity\User $user
 */
class FreestylersTopsUser extends Entity
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
        'freestylers_top_id' => true,
        'user_id' => true,
        'position' => true,
        'points' => true,
        'created' => true,
        'modified' => true,
        'freestylers_top' => true,
        'user' => true
    ];
}
