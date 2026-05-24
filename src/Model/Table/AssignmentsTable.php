<?php
declare(strict_types=1);
namespace App\Model\Table;
use Cake\ORM\Table;

class AssignmentsTable extends Table {
    public function initialize(array $config): void
{
    parent::initialize($config);

    $this->setTable('assignments');
    $this->setDisplayField('assignment_id');
    $this->setPrimaryKey('assignment_id');

    // Pastikan hubungan ini ada:
    $this->belongsTo('Students', [
        'foreignKey' => 'student_id',
    ]);
    
    // TAMBAHKAN KOD INI:
    $this->belongsTo('Subjects', [
        'foreignKey' => 'subject_id',
        
    ]);
}
}
