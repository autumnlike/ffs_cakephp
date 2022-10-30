<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MembersTeamsFixture
 */
class MembersTeamsFixture extends TestFixture
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
                'created' => '2022-10-30 01:23:51',
                'modified' => '2022-10-30 01:23:51',
            ],
        ];
        parent::init();
    }
}
