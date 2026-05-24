<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudentsFixture
 */
class StudentsFixture extends TestFixture
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
                'student_id' => 1,
                'student_number' => 'Lorem ipsum dolor ',
                'ic_number' => 'Lorem ipsum dolor ',
                'full_name' => 'Lorem ipsum dolor sit amet',
                'faculty' => 'Lorem ipsum dolor sit amet',
                'course' => 'Lorem ipsum dolor sit amet',
                'semester' => 'Lorem ipsum dolor ',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
