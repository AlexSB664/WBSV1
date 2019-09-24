<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Matches Model
 *
 * @property \App\Model\Table\CompetitionsTable&\Cake\ORM\Association\BelongsTo $Competitions
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Match get($primaryKey, $options = [])
 * @method \App\Model\Entity\Match newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Match[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Match|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Match saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Match patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Match[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Match findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MatchesTable extends Table
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

        $this->setTable('matches');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Competitions', [
            'foreignKey' => 'competition_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'match_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'matches_users'
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
            ->scalar('stage')
            ->maxLength('stage', 50)
            ->allowEmptyString('stage');

        $validator
            ->integer('points')
            ->allowEmptyString('points');

        $validator
            ->integer('score')
            ->allowEmptyString('score');

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
        $rules->add($rules->existsIn(['competition_id'], 'Competitions'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
    public function getMatchesByCompetition($competition_id)
    {
        $matches_id = [];
        $mtchTmp = $this->find()
            ->where(['competition_id IN' => $competition_id]);
        foreach ($mtchTmp as $mtch) {
            $matches_id[] = $mtch->id;
        }
        return $matches_id;
    }

    public function getId($query)
    {
        $ids = [];
        foreach ($query as $record) {
            $ids[] = $record->id;
        }
        return $ids;
    }

    public function getPonitsUsersByCompetition($user_id, $competition_id)
    {
        $pointsUsers = [];
        $this->competitionsTable = TableRegistry::get('competitions');
        $this->matchesTable = TableRegistry::get('matches');
        $this->matches_usersTable = TableRegistry::get('matches_users');
        $this->usersTable = TableRegistry::get('users');

        $this->matchesTable->find()->where([]);
        $users = $this->usersTable->get($user_id);



        $matches = $this->matchesTable->find()->where(['competition_id' => $competition_id])->first();
        $matchesid = $this->matchesTable->getId($matches);
        $mtchs_points = $matches->select(['points']);
        //una vez traemos los combates que tuvieron cada usuario
        $matches_users = $this->matches_usersTable->find()->where(['match_id IN' => $matchesid]);

        foreach ($mtchs_points as $points) {
            echo ($points->points . ",");
        }


        return $pointsUsers;
    }

    public function getPointsEach($user_id, $match_id)
    {
        $points = 0;
        return points;;
    }
    public function cochinero()
    {
        $id = 0;
        //primero obtenemos todas las competencias dentro de la temporada
        $competitions = $this->competitionsTable->find()->where(['season_id' => $id]);
        $competitionsid = $this->competitionsTable->getId($competitions);
        //una vez hecho con el id de las competencias traemos los matches
        $matches = $this->matchesTable->find()->where(['competition_id IN' => $competitionsid]);
        $mtchs_points = $matches->select(['points']);
        $matchesid = $this->matchesTable->getId($matches);
        //una vez traemos los combates que tuvieron cada usuario
        $matches_users = $this->matches_usersTable->find()->where(['match_id IN' => $matchesid]);


        foreach ($mtchs_points as $points) {
            echo ($points->points . ",");
        }
    }
}
