<?php

namespace App\Controllers;

class Student extends BaseController
{
    public function courses()
    {
        // Check if user is logged in and is student
        if (!session()->get('isLoggedIn') || (session()->get('role') !== 'student' && session()->get('role') !== 'user')) {
            return redirect()->to('/login')->with('error', 'Access denied. Student access required.');
        }

        $data = [
            'title' => 'My Courses - Student',
            'courses' => [] // Will be populated with actual course data
        ];

        return view('student/courses', $data);
    }

    public function grades()
    {
        // Check if user is logged in and is student
        if (!session()->get('isLoggedIn') || (session()->get('role') !== 'student' && session()->get('role') !== 'user')) {
            return redirect()->to('/login')->with('error', 'Access denied. Student access required.');
        }

        $data = [
            'title' => 'My Grades - Student',
            'grades' => [] // Will be populated with actual grade data
        ];

        return view('student/grades', $data);
    }

    public function schedule()
    {
        // Check if user is logged in and is student
        if (!session()->get('isLoggedIn') || (session()->get('role') !== 'student' && session()->get('role') !== 'user')) {
            return redirect()->to('/login')->with('error', 'Access denied. Student access required.');
        }

        $data = [
            'title' => 'Schedule - Student',
            'schedule' => [] // Will be populated with actual schedule data
        ];

        return view('student/schedule', $data);
    }

    public function assignments()
    {
        // Check if user is logged in and is student
        if (!session()->get('isLoggedIn') || (session()->get('role') !== 'student' && session()->get('role') !== 'user')) {
            return redirect()->to('/login')->with('error', 'Access denied. Student access required.');
        }

        $data = [
            'title' => 'Assignments - Student',
            'assignments' => [] // Will be populated with actual assignment data
        ];

        return view('student/assignments', $data);
    }
}
