<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MemberFfsDiagnosesFixture
 */
class MemberFfsDiagnosesFixture extends TestFixture
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
                'a' => 1,
                'b' => 1,
                'c' => 1,
                'd' => 1,
                'e' => 1,
                'four_type' => 'Lorem ipsum dolor sit amet',
                'ninety-one_type' => 'Lorem ipsum dolor sit amet',
                'created' => '2021-12-30 03:16:59',
                'modified' => '2021-12-30 03:16:59',
            ],
        ];
        parent::init();
    }
}
