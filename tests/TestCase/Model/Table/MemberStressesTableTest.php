<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MemberStressesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MemberStressesTable Test Case
 */
class MemberStressesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MemberStressesTable
     */
    protected $MemberStresses;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MemberStresses',
        'app.Members',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MemberStresses') ? [] : ['className' => MemberStressesTable::class];
        $this->MemberStresses = $this->getTableLocator()->get('MemberStresses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MemberStresses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MemberStressesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MemberStressesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
