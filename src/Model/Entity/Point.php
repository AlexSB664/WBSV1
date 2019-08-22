<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Point Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $date
 * @property int $points
 * @property int|null $comp_user_id
 * @property string $stage
 *
 * @property \App\Model\Entity\CompUser $comp_user
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
        'date' => true,
        'points' => true,
        'comp_user_id' => true,
        'stage' => true,
        'comp_user' => true
    ];
}
