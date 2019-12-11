<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FreestylersTopTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FreestylersTopTable Test Case
 */
class FreestylersTopTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FreestylersTopTable
     */
    public $FreestylersTop;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FreestylersTop',
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
        $config = TableRegistry::getTableLocator()->exists('FreestylersTop') ? [] : ['className' => FreestylersTopTable::class];
        $this->FreestylersTop = TableRegistry::getTableLocator()->get('FreestylersTop', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FreestylersTop);

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
