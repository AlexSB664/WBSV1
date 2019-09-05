<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Point Entity
 *
 * @property int $id
 * @property int $points
 * @property int|null $matches_user_id
 * @property string $stage
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\CompetitionsUser $competitions_user
 */
class Point extends Entity
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
        'points' => true,
        'matches_user_id' => true,
        'stage' => true,
        'created' => true,
        'modified' => true,
        'competitions_user' => true
    ];
}
