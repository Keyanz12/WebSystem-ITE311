<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'course_name'      => 'Web Development',
                'course_instructor'=> 'Prof. Santos',
            ],
            [
                'course_name'      => 'Database Management',
                'course_instructor'=> 'Dr. Cruz',
            ],
            [
                'course_name'      => 'Software Engineering',
                'course_instructor'=> 'Engr. Dela Cruz',
            ],
            [
                'course_name'      => 'Information Security',
                'course_instructor'=> 'Prof. Mendoza',
            ],
        ];

        // Insert multiple records at once
        $this->db->table('courses')->insertBatch($data);
    }
}
