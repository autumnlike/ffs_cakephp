<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FfsType Entity
 *
 * @property int $id
 * @property string|null $label
 * @property string|null $name
 * @property string|null $overview
 * @property string|null $long_description
 * @property string|null $short_description
 * @property string|null $stresser
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class FfsType extends Entity
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
        'label' => true,
        'name' => true,
        'overview' => true,
        'long_description' => true,
        'short_description' => true,
        'stresser' => true,
        'created' => true,
        'modified' => true,
    ];
}
