<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity
 *
 * @property int $student_id
 * @property string $student_number
 * @property string $ic_number
 * @property string $full_name
 * @property string $faculty
 * @property string $course
 * @property string $semester
 * @property string $email
 * @property string $password
 */
class Student extends Entity
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
        'student_number' => true,
        'ic_number' => true,
        'full_name' => true,
        'faculty' => true,
        'course' => true,
        'semester' => true,
        'email' => true,
        'password' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected array $_hidden = [
        'password',
    ];
}
