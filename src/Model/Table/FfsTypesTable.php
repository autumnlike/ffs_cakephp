<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FfsTypes Model
 *
 * @method \App\Model\Entity\FfsType newEmptyEntity()
 * @method \App\Model\Entity\FfsType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\FfsType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FfsType get($primaryKey, $options = [])
 * @method \App\Model\Entity\FfsType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\FfsType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FfsType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FfsType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FfsType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FfsType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FfsType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\FfsType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FfsType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FfsTypesTable extends Table
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

        $this->setTable('ffs_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('label')
            ->maxLength('label', 255)
            ->allowEmptyString('label');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->scalar('overview')
            ->maxLength('overview', 255)
            ->allowEmptyString('overview');

        $validator
            ->scalar('long_description')
            ->maxLength('long_description', 255)
            ->allowEmptyString('long_description');

        $validator
            ->scalar('short_description')
            ->maxLength('short_description', 255)
            ->allowEmptyString('short_description');

        $validator
            ->scalar('stresser')
            ->maxLength('stresser', 255)
            ->allowEmptyString('stresser');

        return $validator;
    }
}
