<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Scheme Entity
 *
 * @property int $id
 * @property string $name
 * @property int $league_id
 * @property bool|null $is_default
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\League $league
 * @property \App\Model\Entity\SchemesDetail[] $schemes_details
 */
class Scheme extends Entity
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
        'league_id' => true,
        'is_default' => true,
        'created' => true,
        'modified' => true,
        'league' => true,
        'schemes_details' => true
    ];
}
