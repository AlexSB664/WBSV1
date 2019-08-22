<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SchemesDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SchemesDetailsTable Test Case
 */
class SchemesDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SchemesDetailsTable
     */
    public $SchemesDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SchemesDetails',
        'app.Schemes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SchemesDetails') ? [] : ['className' => SchemesDetailsTable::class];
        $this->SchemesDetails = TableRegistry::getTableLocator()->get('SchemesDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SchemesDetails);

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
