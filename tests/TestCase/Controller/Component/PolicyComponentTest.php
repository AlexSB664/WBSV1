<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\PolicyComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\PolicyComponent Test Case
 */
class PolicyComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\PolicyComponent
     */
    public $Policy;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Policy = new PolicyComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Policy);

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
