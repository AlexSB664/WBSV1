<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FreestylersTopsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FreestylersTopsUsersTable Test Case
 */
class FreestylersTopsUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FreestylersTopsUsersTable
     */
    public $FreestylersTopsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FreestylersTopsUsers',
        'app.FreestylersTops',
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
        $config = TableRegistry::getTableLocator()->exists('FreestylersTopsUsers') ? [] : ['className' => FreestylersTopsUsersTable::class];
        $this->FreestylersTopsUsers = TableRegistry::getTableLocator()->get('FreestylersTopsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FreestylersTopsUsers);

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
