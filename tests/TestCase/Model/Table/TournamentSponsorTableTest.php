<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TournamentSponsorTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TournamentSponsorTable Test Case
 */
class TournamentSponsorTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TournamentSponsorTable
     */
    protected $TournamentSponsor;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TournamentSponsor',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TournamentSponsor') ? [] : ['className' => TournamentSponsorTable::class];
        $this->TournamentSponsor = TableRegistry::getTableLocator()->get('TournamentSponsor', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TournamentSponsor);

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
