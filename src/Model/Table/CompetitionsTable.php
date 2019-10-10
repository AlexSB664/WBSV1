<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Competitions Model
 *
 * @property \App\Model\Table\SeasonsTable&\Cake\ORM\Association\BelongsTo $Seasons
 * @property \App\Model\Table\SchemesTable&\Cake\ORM\Association\BelongsTo $Schemes
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 * @property \App\Model\Table\MatchesTable&\Cake\ORM\Association\HasMany $Matches
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Competition get($primaryKey, $options = [])
 * @method \App\Model\Entity\Competition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Competition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Competition|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Competition saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Competition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Competition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Competition findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CompetitionsTable extends Table
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

        $this->setTable('competitions');
        $this->setDisplayField(['name', 'season_id']);
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('File');

        $this->belongsTo('Seasons', [
            'foreignKey' => 'season_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Schemes', [
            'foreignKey' => 'scheme_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Matches', [
            'foreignKey' => 'competition_id'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'competition_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'competitions_users'
        ]);

        $this->belongsTo('CompetitionsUsers', [
            'foreignKey' => 'id',
            'joinType' => 'LEFT'
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
            ->scalar('flyer')
            ->maxLength('flyer', 100)
            ->allowEmptyString('flyer');


        $validator
            ->dateTime('date')
            ->notEmptyDateTime('date');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->notEmptyString('name');

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
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['scheme_id'], 'Schemes'));

        return $rules;
    }

    public function getCompetitionsBySeason($season_id)
    {
        $competitions_id = [];
        $comptTmp = $this->find()
            ->where(['season_id' => $season_id]);
        foreach ($comptTmp as $cmpt) {
            $competitions_id[] = $cmpt->id;
        }
        return $competitions_id;
    }

    public function getId($query)
    {
        $ids = [];
        foreach ($query as $record) {
            $ids[] = $record->id;
        }
        return $ids;
    }

    public function addCompetitions($data = [])
    {
        if (empty($data)) {
            return false;
        }

        $cmps = $this->newEntity();

        $cmps = $this->patchEntity($cmps, $data);
        $file_name =  $this->uploadFile($data['flyer'], 'img','flyer','uploads/competitions/');
        $cmps->flyer = $file_name;

        if (!$this->save($cmps)) {
            debug($cmps->errors());
            die();
            return false;
        }
        return true;
    }

    public function editCompetitions($competition = null, $data = [])
    {
        if (empty($data)) {
            return false;
        }
        $tmpFlyer = $competition->flyer;
        $cmps = $this->patchEntity($competition, $data);

        if (empty($data['flyer']['tmp_name']) & $data['flyer']['error'] === 4 & empty($data['flyer']['name']) &  empty($data['flyer']['type']) & empty($data['flyer']['size'])) {
            $cmps->flyer = $tmpFlyer;
        } else {
            $this->deleteFile($tmpFlyer, 'img');
            $file_name =  $this->uploadFile($data['flyer'], 'img','flyer','uploads/competitions/');
            $cmps->flyer = $file_name;
        }

        if (!$this->save($cmps)) {
            debug($cmps->errors());
            die();
            return false;
        }
        return true;
    }
}
