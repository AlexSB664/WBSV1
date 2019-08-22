<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CrewsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CrewsTable Test Case
 */
class CrewsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CrewsTable
     */
    public $Crews;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Crews',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Crews') ? [] : ['className' => CrewsTable::class];
        $this->Crews = TableRegistry::getTableLocator()->get('Crews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Crews);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
