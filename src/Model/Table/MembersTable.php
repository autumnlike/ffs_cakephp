<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Entity\Member;

/**
 * Members Model
 *
 * @property \App\Model\Table\MemberFfsDiagnosesTable&\Cake\ORM\Association\HasOne $MemberFfsDiagnosis
 * @property \App\Model\Table\MemberStressesTable&\Cake\ORM\Association\HasMany $MemberStresses
 * @property \App\Model\Table\MembersTeamsTable&\Cake\ORM\Association\HasMany $MembersTeams
 *
 * @method \App\Model\Entity\Member newEmptyEntity()
 * @method \App\Model\Entity\Member newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Member[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Member get($primaryKey, $options = [])
 * @method \App\Model\Entity\Member findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Member patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Member[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Member|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Member saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Member[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Member[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Member[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Member[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MembersTable extends Table
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

        $this->setTable('members');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('MemberFfsDiagnoses', [
            'foreignKey' => 'member_id',
        ]);
        $this->hasMany('MemberStresses', [
            'foreignKey' => 'member_id',
        ]);
        $this->belongsToMany('Teams');
        $this->hasOne('MembersTeams');
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
            ->scalar('key')
            ->maxLength('key', 255)
            ->allowEmptyString('key');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->scalar('name_en')
            ->maxLength('name_en', 255)
            ->allowEmptyString('name_en');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        return $validator;
    }

    public function findOrCreateByEthos(array $row): Member
    {
        $entity = $this->findOrCreate([
            'key' => $row[1],
            'email' => $row[2],
            'name' => $row[3] . $row[4]
        ]);
        // TODO 必ずtrueになるので意味のない分岐
        // バリデーションができてないので追加が必要
        if ($entity->id) {
            return $entity;
        }

        $this->saveOrFail($entity);
        return $entity;
    }
}
