<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\BattlesResolverComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\BattlesResolverComponent Test Case
 */
class BattlesResolverComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\BattlesResolverComponent
     */
    public $BattlesResolver;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->BattlesResolver = new BattlesResolverComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BattlesResolver);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
