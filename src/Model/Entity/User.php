<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $fullname
 * @property string|null $aka
 * @property int $crew_id
 * @property string $email
 * @property string $password
 * @property string $role
 * @property bool|null $status
 * @property string|null $telephone
 * @property string|null $avatar
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Crew $crew
 * @property \App\Model\Entity\Match[] $matches
 */
class User extends Entity
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
        'username' => true,
        'fullname' => true,
        'aka' => true,
        'crew_id' => true,
        'email' => true,
        'password' => true,
        'role' => true,
        'status' => true,
        'telephone' => true,
        'avatar' => true,
        'created' => true,
        'modified' => true,
        'crew' => true,
        'matches' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
