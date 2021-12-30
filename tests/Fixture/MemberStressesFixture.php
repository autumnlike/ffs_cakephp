<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MemberStressesFixture
 */
class MemberStressesFixture extends TestFixture
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
                'member_id' => 1,
                'point' => 1,
                'diagnostic_at' => '2021-12-30',
                'created' => '2021-12-30 03:12:21',
                'modified' => '2021-12-30 03:12:21',
            ],
        ];
        parent::init();
    }
}
