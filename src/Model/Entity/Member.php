<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Member Entity
 *
 * @property int $id
 * @property string|null $key
 * @property string|null $name
 * @property string|null $name_en
 * @property string|null $email
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\MemberFfsDiagnosis $member_ffs_diagnosis
 * @property \App\Model\Entity\MemberStress[] $member_stresses
 * @property \App\Model\Entity\MembersTeam[] $members_teams
 */
class Member extends Entity
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
        'key' => true,
        'name' => true,
        'name_en' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'member_ffs_diagnosis' => true,
        'member_stresses' => true,
        'members_teams' => true,
    ];
}
