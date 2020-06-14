<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PlayerPlace Model
 *
 * @method \App\Model\Entity\PlayerPlace newEmptyEntity()
 * @method \App\Model\Entity\PlayerPlace newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PlayerPlace[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PlayerPlace get($primaryKey, $options = [])
 * @method \App\Model\Entity\PlayerPlace findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PlayerPlace patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PlayerPlace[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PlayerPlace|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PlayerPlace saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PlayerPlace[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PlayerPlace[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PlayerPlace[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PlayerPlace[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PlayerPlaceTable extends Table
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

        $this->setTable('player_place');
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
            ->integer('tourPlay')
            ->requirePresence('tourPlay', 'create')
            ->notEmptyString('tourPlay');

        $validator
            ->integer('place')
            ->allowEmptyString('place');

        $validator
            ->integer('round')
            ->allowEmptyString('round');

        return $validator;
    }
}
