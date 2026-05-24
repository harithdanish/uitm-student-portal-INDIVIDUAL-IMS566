<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AssignmentsFixture
 */
class AssignmentsFixture extends TestFixture
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
                'assignment_id' => 1,
                'assignment_title' => 'Lorem ipsum dolor sit amet',
                'due_date' => '2026-05-21',
                'submission_status' => 'Lorem ipsum dolor sit amet',
                'student_id' => 1,
                'subject_id' => 1,
            ],
        ];
        parent::init();
    }
}
