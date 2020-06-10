<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TournamentPlayerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TournamentPlayerTable Test Case
 */
class TournamentPlayerTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TournamentPlayerTable
     */
    protected $TournamentPlayer;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TournamentPlayer',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TournamentPlayer') ? [] : ['className' => TournamentPlayerTable::class];
        $this->TournamentPlayer = TableRegistry::getTableLocator()->get('TournamentPlayer', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TournamentPlayer);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
