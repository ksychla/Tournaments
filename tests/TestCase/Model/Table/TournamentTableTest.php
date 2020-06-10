<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TournamentTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TournamentTable Test Case
 */
class TournamentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TournamentTable
     */
    protected $Tournament;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Tournament',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Tournament') ? [] : ['className' => TournamentTable::class];
        $this->Tournament = TableRegistry::getTableLocator()->get('Tournament', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Tournament);

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
