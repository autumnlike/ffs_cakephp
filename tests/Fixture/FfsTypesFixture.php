<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FfsTypesFixture
 */
class FfsTypesFixture extends TestFixture
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
                'label' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'overview' => 'Lorem ipsum dolor sit amet',
                'long_description' => 'Lorem ipsum dolor sit amet',
                'short_description' => 'Lorem ipsum dolor sit amet',
                'stresser' => 'Lorem ipsum dolor sit amet',
                'created' => '2021-12-30 03:14:49',
                'modified' => '2021-12-30 03:14:49',
            ],
        ];
        parent::init();
    }
}
