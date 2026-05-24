<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

class AttendanceController extends AppController
{
    public function index()
{
    $Students = TableRegistry::getTableLocator()->get('Students');
    $Assignments = TableRegistry::getTableLocator()->get('Assignments');

    // Ambil semua pelajar supaya yang belum ada rekod pun muncul
    $studentsList = $Students->find()->all();
    $attendance = [];

    foreach ($studentsList as $student) {
        // Kira jumlah tugasan untuk pelajar ini
        $total = $Assignments->find()->where(['student_id' => $student->student_id])->count();
        
        // Kira tugasan yang sudah 'Submitted'
        $submitted = $Assignments->find()->where([
            'student_id' => $student->student_id,
            'submission_status' => 'Submitted'
        ])->count();

        // Kira peratusan
        $percentage = ($total > 0) ? round(($submitted / $total) * 100) : 0;

        // Simpan dalam array untuk dipaparkan
        $attendance[] = [
            'name' => $student->full_name,
            'student_number' => $student->student_number,
            'percentage' => $percentage
        ];
    }

    $this->set(compact('attendance'));
}
}