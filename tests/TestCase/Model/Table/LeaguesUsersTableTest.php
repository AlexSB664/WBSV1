<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LeaguesUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LeaguesUsersTable Test Case
 */
class LeaguesUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LeaguesUsersTable
     */
    public $LeaguesUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.LeaguesUsers',
        'app.Leagues',
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
        $config = TableRegistry::getTableLocator()->exists('LeaguesUsers') ? [] : ['className' => LeaguesUsersTable::class];
        $this->LeaguesUsers = TableRegistry::getTableLocator()->get('LeaguesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LeaguesUsers);

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
