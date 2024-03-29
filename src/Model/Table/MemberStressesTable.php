<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\FrozenTime;
use App\Model\Entity\MemberStress;

/**
 * MemberStresses Model
 *
 * @property \App\Model\Table\MembersTable&\Cake\ORM\Association\BelongsTo $Members
 *
 * @method \App\Model\Entity\MemberStress newEmptyEntity()
 * @method \App\Model\Entity\MemberStress newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MemberStress[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MemberStress get($primaryKey, $options = [])
 * @method \App\Model\Entity\MemberStress findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MemberStress patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MemberStress[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MemberStress|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MemberStress saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MemberStress[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MemberStress[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MemberStress[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MemberStress[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MemberStressesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('member_stresses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Members', [
            'foreignKey' => 'member_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('point')
            ->range('point', [0, 20], 'ストレス値は 0 ~ 20 で指定してください');

        $validator
            ->date('diagnostic_at');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('member_id', 'Members'), ['errorField' => 'member_id']);

        return $rules;
    }

    public function createAllByEthos(int $memberId, array $row): array
    {
        $return = [];
        foreach ([18, 20, 22, 24, 26, 28] as $key) {
            if (empty($row[$key]) || (bool)$row[$key] === FALSE) {
                // 直近から入るのでこれ以降入ることは無い
                break;
            }
            $entity = $this->findOrCreate([
                'member_id' => $memberId,
                'point' => $row[$key],
                'diagnostic_at' => new FrozenTime($row[$key+1])
            ]);
            if ($entity) {
                continue;
            }

            $this->saveOrFail($entity);
            $return[] = $entity;
        }
        return $return;
    }
}
