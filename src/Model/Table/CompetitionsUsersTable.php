<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CompetitionsUsers Model
 *
 * @property \App\Model\Table\CompetitionsTable&\Cake\ORM\Association\BelongsTo $Competitions
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\CompetitionsUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\CompetitionsUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CompetitionsUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CompetitionsUser|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompetitionsUser saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompetitionsUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CompetitionsUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CompetitionsUser findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CompetitionsUsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('competitions_users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Competitions', [
            'foreignKey' => 'competitions_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->boolean('assistance')
            ->allowEmptyString('assistance');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['competitions_id'], 'Competitions'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }

    public function getJoined($user_id){
        $competitions_id = [];
        $cmpTmp = $this->find('all',['contain' =>['Users']])
        ->where(['users_id'=>$user_id]);
        foreach ($cmpTmp as $cmp) {
            $competitions_id[] = $cmp->competitions_id;
        }
        return $competitions_id;
    }

}
