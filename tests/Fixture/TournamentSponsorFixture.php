<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TournamentSponsorFixture
 */
class TournamentSponsorFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tournament_sponsor';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'tournament' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sponsor' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_tournament' => ['type' => 'index', 'columns' => ['tournament'], 'length' => []],
            'fk_sponsor' => ['type' => 'index', 'columns' => ['sponsor'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_sponsor' => ['type' => 'foreign', 'columns' => ['sponsor'], 'references' => ['sponsor', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_tournament' => ['type' => 'foreign', 'columns' => ['tournament'], 'references' => ['tournament', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'tournament' => 1,
                'sponsor' => 1,
            ],
        ];
        parent::init();
    }
}
