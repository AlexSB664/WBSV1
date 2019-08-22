<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MatchesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MatchesTable Test Case
 */
class MatchesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MatchesTable
     */
    public $Matches;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Matches',
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
        $config = TableRegistry::getTableLocator()->exists('Matches') ? [] : ['className' => MatchesTable::class];
        $this->Matches = TableRegistry::getTableLocator()->get('Matches', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Matches);

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
