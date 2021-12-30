<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ManagersFixture
 */
class ManagersFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit amet',
                'created' => '2021-12-30 03:14:43',
                'modified' => '2021-12-30 03:14:43',
            ],
        ];
        parent::init();
    }
}
