<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tournament Model
 *
 * @method \App\Model\Entity\Tournament newEmptyEntity()
 * @method \App\Model\Entity\Tournament newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tournament[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tournament get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tournament findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tournament patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tournament[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tournament|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tournament saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tournament[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tournament[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tournament[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tournament[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TournamentTable extends Table
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

        $this->setTable('tournament');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('dyscypline')
            ->requirePresence('dyscypline', 'create')
            ->notEmptyString('dyscypline');

        $validator
            ->integer('pearson')
            ->requirePresence('pearson', 'create')
            ->notEmptyString('pearson');

        $validator
            ->date('time')
            ->requirePresence('time', 'create')
            ->notEmptyDate('time');

        $validator
            ->scalar('location')
            ->requirePresence('location', 'create')
            ->notEmptyString('location');

        $validator
            ->integer('players_limit')
            ->requirePresence('players_limit', 'create')
            ->notEmptyString('players_limit');

        $validator
            ->date('deadline')
            ->requirePresence('deadline', 'create')
            ->notEmptyDate('deadline');

        $validator
            ->integer('players')
            ->requirePresence('players', 'create')
            ->notEmptyString('players');

        return $validator;
    }
}
