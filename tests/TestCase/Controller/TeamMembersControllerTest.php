<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\TeamMembersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\TeamMembersController Test Case
 *
 * @uses \App\Controller\TeamMembersController
 */
class TeamMembersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TeamMembers',
        'app.Teams',
        'app.Members',
    ];

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\TeamMembersController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\TeamMembersController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
