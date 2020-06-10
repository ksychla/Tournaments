<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DysciplineTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DysciplineTable Test Case
 */
class DysciplineTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DysciplineTable
     */
    protected $Dyscipline;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Dyscipline',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Dyscipline') ? [] : ['className' => DysciplineTable::class];
        $this->Dyscipline = TableRegistry::getTableLocator()->get('Dyscipline', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Dyscipline);

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
