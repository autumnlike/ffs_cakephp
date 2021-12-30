<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MemberFfsDiagnosesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MemberFfsDiagnosesTable Test Case
 */
class MemberFfsDiagnosesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MemberFfsDiagnosesTable
     */
    protected $MemberFfsDiagnoses;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MemberFfsDiagnoses',
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
        $config = $this->getTableLocator()->exists('MemberFfsDiagnoses') ? [] : ['className' => MemberFfsDiagnosesTable::class];
        $this->MemberFfsDiagnoses = $this->getTableLocator()->get('MemberFfsDiagnoses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MemberFfsDiagnoses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MemberFfsDiagnosesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MemberFfsDiagnosesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
