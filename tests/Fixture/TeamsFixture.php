<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TeamsFixture
 */
class TeamsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'member_id' => 1,
                'created' => '2022-01-02 06:58:43',
                'modified' => '2022-01-02 06:58:43',
            ],
        ];
        parent::init();
    }
}
