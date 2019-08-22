<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CompetitionsUser Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $date
 * @property int $season_id
 * @property bool|null $status
 * @property int $localitation_id
 *
 * @property \App\Model\Entity\Season $season
 * @property \App\Model\Entity\Localitation $localitation
 */
class CompetitionsUser extends Entity
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
        'localitation_id' => true,
        'season' => true,
        'localitation' => true
    ];
}
