<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlayerPlaceTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlayerPlaceTable Test Case
 */
class PlayerPlaceTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PlayerPlaceTable
     */
    protected $PlayerPlace;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PlayerPlace',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PlayerPlace') ? [] : ['className' => PlayerPlaceTable::class];
        $this->PlayerPlace = TableRegistry::getTableLocator()->get('PlayerPlace', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PlayerPlace);

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
