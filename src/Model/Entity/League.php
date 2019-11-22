<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * League Entity
 *
 * @property int $id
 * @property string|null $logo
 * @property string $name
 * @property string $description
 * @property string $social_facebook
 * @property string $social_twitter
 * @property string $social_instagram
 * @property string $social_youtube
 * @property string $social_website
 * @property string $contact_phone
 * @property string $contact_email
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Scheme[] $schemes
 * @property \App\Model\Entity\Season[] $seasons
 */
class League extends Entity
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
        'logo' => true,
        'name' => true,
        'description' => true,
        'social_facebook' => true,
        'social_twitter' => true,
        'social_instagram' => true,
        'social_youtube' => true,
        'social_website' => true,
        'contact_phone' => true,
        'contact_email' => true,
        'created' => true,
        'modified' => true,
        'schemes' => true,
        'seasons' => true,
        'slug' => true,
        'since' => true,
        'level' => true,
        'score' => true,
        'bonus' => true
    ];
}
