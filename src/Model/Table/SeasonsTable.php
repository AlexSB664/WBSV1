<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Seasons Model
 *
 * @property \App\Model\Table\LeaguesTable&\Cake\ORM\Association\BelongsTo $Leagues
 * @property \App\Model\Table\CompetitionsTable&\Cake\ORM\Association\HasMany $Competitions
 *
 * @method \App\Model\Entity\Season get($primaryKey, $options = [])
 * @method \App\Model\Entity\Season newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Season[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Season|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Season saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Season patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Season[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Season findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SeasonsTable extends Table
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

        $this->setTable('seasons');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Leagues', [
            'foreignKey' => 'league_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Competitions', [
            'foreignKey' => 'season_id'
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
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 200)
            ->notEmptyString('description');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

        $validator
            ->dateTime('date_start')
            ->notEmptyDateTime('date_start');

        $validator
            ->dateTime('date_end')
            ->allowEmptyDateTime('date_end');

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
