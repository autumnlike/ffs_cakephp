<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\MembersTeamsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\MembersTeamsController Test Case
 *
 * @uses \App\Controller\MembersTeamsController
 */
class MembersTeamsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MembersTeams',
        'app.Teams',
        'app.Members',
    ];

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\MembersTeamsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\MembersTeamsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
