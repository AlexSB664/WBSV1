<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\CrewsTable&\Cake\ORM\Association\BelongsTo $Crews
 * @property \App\Model\Table\MatchesTable&\Cake\ORM\Association\BelongsToMany $Matches
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField(['aka', 'email']);
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('File');

        $this->belongsTo('Crews', [
            'foreignKey' => 'crew_id'
        ]);
        $this->belongsToMany('Matches', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'match_id',
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
            ->scalar('username')
            ->maxLength('username', 50)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('fullname')
            ->maxLength('fullname', 200)
            ->requirePresence('fullname', 'create')
            ->notEmptyString('fullname');

        $validator
            ->scalar('aka')
            ->maxLength('aka', 50)
            ->allowEmptyString('aka');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 225)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('role')
            ->maxLength('role', 15)
            ->notEmptyString('role');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

        $validator
            ->scalar('telephone')
            ->maxLength('telephone', 20)
            ->allowEmptyString('telephone');

        $validator
            ->scalar('avatar')
            ->maxLength('avatar', 100)
            ->allowEmptyString('avatar');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['crew_id'], 'Crews'));

        return $rules;
    }
    public function addParticipan($user_id, $data = [])
    {
        if (empty($data)) {
            return false;
        }

        $user = $this->newEntity();

        $user = $this->patchEntity($user, $data);
        $user->status = 1;
        if (empty($data['avatar']['tmp_name']) & $data['avatar']['error'] === 4 & empty($data['avatar']['name']) &  empty($data['avatar']['type']) & empty($data['avatar']['size'])) {
            $user->avatar = 'default.png';
        } else {
            $file_name =  $this->uploadFile($data['avatar'], 'img', 'uploads/users/');
            $user->avatar = $file_name;
        }

        if (!$this->save($user)) {
            debug($user->errors());
            die();
            return false;
        }
        return true;
    }

    public function editParticipan($user = null, $data = [])
    {
        if (empty($data)) {
            return false;
        }
        $tmpAvatar = $user->avatar;
        $tmpHeadBG = $user->head_bg;

        $user = $this->patchEntity($user, $data);


        if (empty($data['avatar']['tmp_name']) & $data['avatar']['error'] === 4 & empty($data['avatar']['name']) &  empty($data['avatar']['type']) & empty($data['avatar']['size'])) {
            $user->avatar = $tmpAvatar;
        } else {
            $this->deleteFile($tmpAvatar, 'img');
            $file_name =  $this->uploadFile($data['avatar'], 'img', 'uploads/users/');
            $user->avatar = $file_name;
        }
        if (empty($data['head_bg']['tmp_name']) & $data['head_bg']['error'] === 4 & empty($data['head_bg']['name']) &  empty($data['head_bg']['type']) & empty($data['head_bg']['size'])) {
            $user->head_bg = $tmpHeadBG;
        } else {
            $this->deleteFile($tmpHeadBG, 'img');
            $file_name =  $this->uploadFile($data['head_bg'], 'img', 'uploads/users/');
            $user->head_bg = $file_name;
        }


        if (!$this->save($user)) {
            debug($user->errors());
            die();
            return false;
        }
        return true;
    }
}
