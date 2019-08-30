<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompetitionUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompetitionUsersTable Test Case
 */
class CompetitionUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompetitionUsersTable
     */
    public $CompetitionUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CompetitionUsers',
        'app.Competitions',
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
        $config = TableRegistry::getTableLocator()->exists('CompetitionUsers') ? [] : ['className' => CompetitionUsersTable::class];
        $this->CompetitionUsers = TableRegistry::getTableLocator()->get('CompetitionUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompetitionUsers);

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
