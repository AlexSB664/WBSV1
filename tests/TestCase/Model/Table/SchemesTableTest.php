<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SchemesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SchemesTable Test Case
 */
class SchemesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SchemesTable
     */
    public $Schemes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Schemes',
        'app.Leagues',
        'app.SchemesDetails'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Schemes') ? [] : ['className' => SchemesTable::class];
        $this->Schemes = TableRegistry::getTableLocator()->get('Schemes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Schemes);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
