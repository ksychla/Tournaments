<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TournamentSponsor Model
 *
 * @method \App\Model\Entity\TournamentSponsor newEmptyEntity()
 * @method \App\Model\Entity\TournamentSponsor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TournamentSponsor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TournamentSponsor get($primaryKey, $options = [])
 * @method \App\Model\Entity\TournamentSponsor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TournamentSponsor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TournamentSponsor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TournamentSponsor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TournamentSponsor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TournamentSponsor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TournamentSponsor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TournamentSponsor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TournamentSponsor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TournamentSponsorTable extends Table
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

        $this->setTable('tournament_sponsor');
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
            ->integer('tournament')
            ->requirePresence('tournament', 'create')
            ->notEmptyString('tournament');

        $validator
            ->integer('sponsor')
            ->requirePresence('sponsor', 'create')
            ->notEmptyString('sponsor');

        return $validator;
    }
}
