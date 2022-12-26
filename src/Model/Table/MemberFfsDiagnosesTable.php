<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Entity\MemberFfsDiagnosis;

/**
 * MemberFfsDiagnoses Model
 *
 * @property \App\Model\Table\MembersTable&\Cake\ORM\Association\BelongsTo $Members
 *
 * @method \App\Model\Entity\MemberFfsDiagnosis newEmptyEntity()
 * @method \App\Model\Entity\MemberFfsDiagnosis newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MemberFfsDiagnosis[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MemberFfsDiagnosis get($primaryKey, $options = [])
 * @method \App\Model\Entity\MemberFfsDiagnosis findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MemberFfsDiagnosis patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MemberFfsDiagnosis[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MemberFfsDiagnosis|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MemberFfsDiagnosis saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MemberFfsDiagnosis[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MemberFfsDiagnosis[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MemberFfsDiagnosis[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MemberFfsDiagnosis[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MemberFfsDiagnosesTable extends Table
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

        $this->setTable('member_ffs_diagnoses');
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
            ->integer('a')
            ->allowEmptyString('a');

        $validator
            ->integer('b')
            ->allowEmptyString('b');

        $validator
            ->integer('c')
            ->allowEmptyString('c');

        $validator
            ->integer('d')
            ->allowEmptyString('d');

        $validator
            ->integer('e')
            ->allowEmptyString('e');

        $validator
            ->scalar('four_type')
            ->maxLength('four_type', 255)
            ->allowEmptyString('four_type');

        $validator
            ->scalar('ninety_one_type')
            ->maxLength('ninety_one_type', 255)
            ->allowEmptyString('ninety_one_type');

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

    public function findOrCreateByEthos(int $memberId, array $row): MemberFfsDiagnosis
    {
        $entity = $this->findOrCreate([
            'member_id' => $memberId,
        ]);
        if ($entity->a) {
            return $entity;
        }

        $entity->a = $row[7];
        $entity->b = $row[8];
        $entity->c = $row[9];
        $entity->d = $row[10];
        $entity->e = $row[11];
        $entity->four_type = $row[13];
        $entity->ninety_one_type = $row[14];
        $this->saveOrFail($entity);
        return $entity;
    }
}
