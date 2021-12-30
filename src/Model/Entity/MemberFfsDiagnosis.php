<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MemberFfsDiagnosis Entity
 *
 * @property int $id
 * @property int|null $member_id
 * @property int|null $a
 * @property int|null $b
 * @property int|null $c
 * @property int|null $d
 * @property int|null $e
 * @property string|null $for_type
 * @property string|null $ninety-one_type
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Member $member
 */
class MemberFfsDiagnosis extends Entity
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
        'member_id' => true,
        'a' => true,
        'b' => true,
        'c' => true,
        'd' => true,
        'e' => true,
        'for_type' => true,
        'ninety-one_type' => true,
        'created' => true,
        'modified' => true,
        'member' => true,
    ];
}
