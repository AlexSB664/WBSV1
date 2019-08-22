<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MatchesUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MatchesUsersTable Test Case
 */
class MatchesUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MatchesUsersTable
     */
    public $MatchesUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MatchesUsers',
        'app.Matches',
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
        $config = TableRegistry::getTableLocator()->exists('MatchesUsers') ? [] : ['className' => MatchesUsersTable::class];
        $this->MatchesUsers = TableRegistry::getTableLocator()->get('MatchesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MatchesUsers);

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
