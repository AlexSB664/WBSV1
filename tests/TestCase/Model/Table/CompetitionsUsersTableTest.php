<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompetitionsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompetitionsUsersTable Test Case
 */
class CompetitionsUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompetitionsUsersTable
     */
    public $CompetitionsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CompetitionsUsers',
        'app.Seasons',
        'app.Localitations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CompetitionsUsers') ? [] : ['className' => CompetitionsUsersTable::class];
        $this->CompetitionsUsers = TableRegistry::getTableLocator()->get('CompetitionsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompetitionsUsers);

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
