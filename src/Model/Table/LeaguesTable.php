<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Leagues Model
 *
 * @property \App\Model\Table\SchemesTable&\Cake\ORM\Association\HasMany $Schemes
 * @property \App\Model\Table\SeasonsTable&\Cake\ORM\Association\HasMany $Seasons
 *
 * @method \App\Model\Entity\League get($primaryKey, $options = [])
 * @method \App\Model\Entity\League newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\League[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\League|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\League saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\League patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\League[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\League findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LeaguesTable extends Table
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

        $this->setTable('leagues');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('File');

        $this->hasMany('Schemes', [
            'foreignKey' => 'league_id'
        ]);
        $this->hasMany('Seasons', [
            'foreignKey' => 'league_id'
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
            ->scalar('logo')
            ->maxLength('logo', 100)
            ->allowEmptyString('logo');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 200)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('social_facebook')
            ->maxLength('social_facebook', 225)
            ->requirePresence('social_facebook', 'create')
            ->notEmptyString('social_facebook');

        $validator
            ->scalar('social_twitter')
            ->maxLength('social_twitter', 225)
            ->requirePresence('social_twitter', 'create')
            ->notEmptyString('social_twitter');

        $validator
            ->scalar('social_instagram')
            ->maxLength('social_instagram', 225)
            ->requirePresence('social_instagram', 'create')
            ->notEmptyString('social_instagram');

        $validator
            ->scalar('social_youtube')
            ->maxLength('social_youtube', 225)
            ->requirePresence('social_youtube', 'create')
            ->notEmptyString('social_youtube');

        $validator
            ->scalar('social_website')
            ->maxLength('social_website', 225)
            ->requirePresence('social_website', 'create')
            ->notEmptyString('social_website');

        $validator
            ->scalar('contact_phone')
            ->maxLength('contact_phone', 20)
            ->requirePresence('contact_phone', 'create')
            ->notEmptyString('contact_phone');

        $validator
            ->scalar('contact_email')
            ->maxLength('contact_email', 50)
            ->requirePresence('contact_email', 'create')
            ->notEmptyString('contact_email');

        return $validator;
    }

    public function addLeague($data = [])
    {
        if (empty($data)) {
            return false;
        }

        $lgs = $this->newEntity();

        $lgs = $this->patchEntity($lgs, $data);

        $file_name =  $this->uploadFile($data['logo'], 'img', 'uploads/leagues/');
        $lgs->logo = $file_name;

        if (!$this->save($lgs)) {
            debug($lgs->errors());
            die();
            return false;
        }
        return true;
    }
    public function  getIdBySlug($leagues_slug)
    {
        $lgs = $this->find()->where(['slug' => $leagues_slug])->first();
        return $lgs;
    }

    public function editLeague($leaguaje = null, $data = [])
    {
        if (empty($data)) {
            return false;
        }
        $tmpLogo = $leaguaje->logo;

        $lgs = $this->patchEntity($leaguaje, $data);
        
        if (empty($data['logo']['tmp_name']) & $data['logo']['error'] === 4 & empty($data['logo']['name']) &  empty($data['logo']['type']) & empty($data['logo']['size'])) {
            $lgs->logo = $tmpLogo;
        } else {
            $this->deleteFile($tmpLogo, 'img');
            $file_name =  $this->uploadFile($data['logo'], 'img', 'uploads/leagues/');
            $lgs->logo = $file_name;
        }

        if (!$this->save($lgs)) {
            debug($lgs->errors());
            die();
            return false;
        }
        return true;
    }
}
