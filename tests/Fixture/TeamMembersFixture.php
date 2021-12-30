<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TeamMembersFixture
 */
class TeamMembersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'team_id' => 1,
                'member_id' => 1,
                'created' => '2021-12-30 03:12:01',
                'modified' => '2021-12-30 03:12:01',
            ],
        ];
        parent::init();
    }
}
