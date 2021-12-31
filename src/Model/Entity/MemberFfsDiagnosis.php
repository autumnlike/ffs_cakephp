<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

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
 * @property string|null $four_type
 * @property string|null $ninety_one_type
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
        'four_type' => true,
        'ninety_one_type' => true,
        'created' => true,
        'modified' => true,
        'member' => true,
    ];

    /**
     * 91type をもとに因子説明を返す
     *
     * @return string
     */
    public function description(): string
    {
        $types = $this->getTypes();

        if (count($types) === 1) {
            // 1因子なら長い説明を
            return $types[0]->long_description;
        }

        # 複数因子の場合は説明を連結
        $description = null;
        foreach ($types as $key => $type) {
            if ($key === 0) {
                $description = 'まず、';
            } elseif (count($types) === $key-1) {
                $description .= '最後に、';
            } else {
                $description .= '次に、';
            }
            $description .= $type->short_description;
        }
        return $description;
    }

    /**
     * 91typeを取得
     *
     * @return array
     */
    public function getTypes(): array
    {
        $types = str_split($this->ninety_one_type, 1);
        $ffsTypes = [];
        $table = TableRegistry::getTableLocator()->get('FfsTypes');
        // 順番を因子順にするために1つずつ取得
        foreach ($types as $type) {
            $ffsTypes[] = $table->findByLabel($type)->first();
        }
        return $ffsTypes;
    }
}
