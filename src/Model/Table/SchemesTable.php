<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schemes Model
 *
 * @property \App\Model\Table\LeaguesTable&\Cake\ORM\Association\BelongsTo $Leagues
 * @property \App\Model\Table\SchemesDetailsTable&\Cake\ORM\Association\HasMany $SchemesDetails
 *
 * @method \App\Model\Entity\Scheme get($primaryKey, $options = [])
 * @method \App\Model\Entity\Scheme newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Scheme[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Scheme|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Scheme saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Scheme patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Scheme[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Scheme findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SchemesTable extends Table
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

        $this->setTable('schemes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Leagues', [
            'foreignKey' => 'league_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('SchemesDetails', [
            'foreignKey' => 'scheme_id'
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->boolean('is_default')
            ->allowEmptyString('is_default');

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
        $rules->add($rules->existsIn(['league_id'], 'Leagues'));

        return $rules;
    }
}
