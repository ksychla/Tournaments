<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TournamentPlayer Model
 *
 * @method \App\Model\Entity\TournamentPlayer newEmptyEntity()
 * @method \App\Model\Entity\TournamentPlayer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TournamentPlayer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TournamentPlayer get($primaryKey, $options = [])
 * @method \App\Model\Entity\TournamentPlayer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TournamentPlayer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TournamentPlayer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TournamentPlayer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TournamentPlayer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TournamentPlayer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TournamentPlayer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TournamentPlayer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TournamentPlayer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TournamentPlayerTable extends Table
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

        $this->setTable('tournament_player');
        $this->setDisplayField('id');
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
            ->integer('player')
            ->requirePresence('player', 'create')
            ->notEmptyString('player');

        $validator
            ->integer('tournament')
            ->requirePresence('tournament', 'create')
            ->notEmptyString('tournament');

        return $validator;
    }
}
