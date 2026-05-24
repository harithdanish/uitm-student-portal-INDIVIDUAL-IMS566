<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Attendance Entity
 *
 * @property int $attendance_id
 * @property int $attendance_percentage
 * @property string $attendance_status
 * @property int|null $student_id
 * @property int|null $subject_id
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\Subject $subject
 */
class Attendance extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'attendance_percentage' => true,
        'attendance_status' => true,
        'student_id' => true,
        'subject_id' => true,
        'student' => true,
        'subject' => true,
    ];
}
