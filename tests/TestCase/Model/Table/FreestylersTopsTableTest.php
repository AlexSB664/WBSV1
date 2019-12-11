<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FreestylersTopsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FreestylersTopsTable Test Case
 */
class FreestylersTopsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FreestylersTopsTable
     */
    public $FreestylersTops;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('FreestylersTops') ? [] : ['className' => FreestylersTopsTable::class];
        $this->FreestylersTops = TableRegistry::getTableLocator()->get('FreestylersTops', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FreestylersTops);

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
