<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CompetitionsUsers Model
 *
 * @property \App\Model\Table\SeasonsTable&\Cake\ORM\Association\BelongsTo $Seasons
 * @property \App\Model\Table\LocalitationsTable&\Cake\ORM\Association\BelongsTo $Localitations
 *
 * @method \App\Model\Entity\CompetitionsUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\CompetitionsUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CompetitionsUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CompetitionsUser|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompetitionsUser saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompetitionsUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CompetitionsUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CompetitionsUser findOrCreate($search, callable $callback = null, $options = [])
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

        $this->belongsTo('Seasons', [
            'foreignKey' => 'season_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Localitations', [
            'foreignKey' => 'localitation_id',
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
            ->dateTime('date')
            ->notEmptyDateTime('date');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

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
        $rules->add($rules->existsIn(['season_id'], 'Seasons'));
        $rules->add($rules->existsIn(['localitation_id'], 'Localitations'));

        return $rules;
    }
}
