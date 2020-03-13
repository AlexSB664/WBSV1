<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\CompetitionUsersResolveComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\CompetitionUsersResolveComponent Test Case
 */
class CompetitionUsersResolveComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\CompetitionUsersResolveComponent
     */
    public $CompetitionUsersResolve;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->CompetitionUsersResolve = new CompetitionUsersResolveComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompetitionUsersResolve);

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
