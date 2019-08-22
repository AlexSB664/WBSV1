<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SchemesDetail Entity
 *
 * @property int $id
 * @property int $scheme_id
 * @property string $position
 * @property int|null $points
 * @property int|null $aditional_points
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Scheme $scheme
 */
class SchemesDetail extends Entity
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
        'scheme_id' => true,
        'position' => true,
        'points' => true,
        'aditional_points' => true,
        'created' => true,
        'modified' => true,
        'scheme' => true
    ];
}
