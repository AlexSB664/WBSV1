<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FreestylersTopUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FreestylersTopUsersTable Test Case
 */
class FreestylersTopUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FreestylersTopUsersTable
     */
    public $FreestylersTopUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FreestylersTopUsers',
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
        $config = TableRegistry::getTableLocator()->exists('FreestylersTopUsers') ? [] : ['className' => FreestylersTopUsersTable::class];
        $this->FreestylersTopUsers = TableRegistry::getTableLocator()->get('FreestylersTopUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FreestylersTopUsers);

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
