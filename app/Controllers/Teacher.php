<?php

namespace App\Controllers;

class Teacher extends BaseController
{
    public function courses()
    {
        // Check if user is logged in and is teacher
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'teacher') {
            return redirect()->to('/login')->with('error', 'Access denied. Teacher access required.');
        }

        $data = [
            'title' => 'My Courses - Teacher',
            'courses' => [] // Will be populated with actual course data
        ];

        return view('teacher/courses', $data);
    }

    public function students()
    {
        // Check if user is logged in and is teacher
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'teacher') {
            return redirect()->to('/login')->with('error', 'Access denied. Teacher access required.');
        }

        $data = [
            'title' => 'Students - Teacher',
            'students' => [] // Will be populated with actual student data
        ];

        return view('teacher/students', $data);
    }

    public function gradebook()
    {
        // Check if user is logged in and is teacher
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'teacher') {
            return redirect()->to('/login')->with('error', 'Access denied. Teacher access required.');
        }

        $data = [
            'title' => 'Grade Book - Teacher',
            'grades' => [] // Will be populated with actual grade data
        ];

        return view('teacher/gradebook', $data);
    }

    public function assignments()
    {
        // Check if user is logged in and is teacher
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'teacher') {
            return redirect()->to('/login')->with('error', 'Access denied. Teacher access required.');
        }

        $data = [
            'title' => 'Assignments - Teacher',
            'assignments' => [] // Will be populated with actual assignment data
        ];

        return view('teacher/assignments', $data);
    }
}
