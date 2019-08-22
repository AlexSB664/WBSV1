<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LeaguesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LeaguesTable Test Case
 */
class LeaguesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LeaguesTable
     */
    public $Leagues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Leagues',
        'app.Schemes',
        'app.Seasons'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Leagues') ? [] : ['className' => LeaguesTable::class];
        $this->Leagues = TableRegistry::getTableLocator()->get('Leagues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Leagues);

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
