<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FfsTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FfsTypesTable Test Case
 */
class FfsTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FfsTypesTable
     */
    protected $FfsTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.FfsTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FfsTypes') ? [] : ['className' => FfsTypesTable::class];
        $this->FfsTypes = $this->getTableLocator()->get('FfsTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->FfsTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FfsTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
