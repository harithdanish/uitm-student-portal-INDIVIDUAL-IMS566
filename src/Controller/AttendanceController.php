<?php
declare(strict_types=1);

namespace App\Controller;

class AttendanceController extends AppController
{
    public function index()
    {
        $Students = $this->fetchTable('Students');
        $Assignments = $this->fetchTable('Assignments');

        $students = $Students->find()
            ->order(['full_name' => 'ASC'])
            ->all();

        $attendance = [];

        foreach ($students as $student) {

            $totalAssignments = $Assignments->find()
                ->where(['student_id' => $student->student_id])
                ->count();

            $submittedAssignments = $Assignments->find()
                ->where([
                    'student_id' => $student->student_id,
                    'submission_status' => 'Submitted'
                ])
                ->count();

            $percentage = 0;

            if ($totalAssignments > 0) {
                $percentage = round(($submittedAssignments / $totalAssignments) * 100);
            }

            if ($percentage >= 80) {
                $status = 'Excellent';
            } elseif ($percentage >= 60) {
                $status = 'Good';
            } elseif ($percentage >= 40) {
                $status = 'Average';
            } else {
                $status = 'Poor';
            }

            $attendance[] = [
                'student_id' => $student->student_id,
                'name' => $student->full_name,
                'student_number' => $student->student_number,
                'submitted_assignments' => $submittedAssignments,
                'total_assignments' => $totalAssignments,
                'percentage' => $percentage,
                'status' => $status
            ];
        }

        $this->set(compact('attendance'));
    }
}