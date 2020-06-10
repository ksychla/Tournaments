<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SponsorTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SponsorTable Test Case
 */
class SponsorTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SponsorTable
     */
    protected $Sponsor;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Sponsor',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Sponsor') ? [] : ['className' => SponsorTable::class];
        $this->Sponsor = TableRegistry::getTableLocator()->get('Sponsor', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Sponsor);

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
