<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Match Entity
 *
 * @property int $id
 * @property int $competition_id
 * @property string|null $stage
 * @property int|null $points
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Competition $competition
 * @property \App\Model\Entity\User[] $users
 */
class Match extends Entity
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
        'competition_id' => true,
        'stage' => true,
        'points' => true,
        'created' => true,
        'modified' => true,
        'competition' => true,
        'users' => true,
        'winner'=>true
    ];
}
