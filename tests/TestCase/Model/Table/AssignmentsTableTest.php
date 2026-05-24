<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssignmentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssignmentsTable Test Case
 */
class AssignmentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AssignmentsTable
     */
    protected $Assignments;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Assignments',
        'app.Students',
        'app.Subjects',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Assignments') ? [] : ['className' => AssignmentsTable::class];
        $this->Assignments = $this->getTableLocator()->get('Assignments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Assignments);

        parent::tearDown();
    }
}
