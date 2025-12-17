<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    public function users()
    {
        // Check if user is logged in and is admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Access denied. Admin access required.');
        }

        $userModel = new UserModel();
        $data = [
            'title' => 'Manage Users - Admin',
            'users' => $userModel->findAll()
        ];

        return view('admin/users', $data);
    }

    public function createUser()
    {
        // Check if user is logged in and is admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Access denied. Admin access required.');
        }

        $userModel = new UserModel();
        
        $data = [
            'name'         => $this->request->getPost('name'),
            'email'        => $this->request->getPost('email'),
            'password'     => $this->request->getPost('password'),
            'role'         => $this->request->getPost('role'),
        ];

        if (!$userModel->save($data)) {
            return redirect()->to('/admin/users')
                             ->with('error', 'Failed to create user. Please check your input.')
                             ->with('validation_errors', $userModel->errors());
        }

        return redirect()->to('/admin/users')
                         ->with('success', 'User created successfully!');
    }

    public function deleteUser($id)
    {
        // Check if user is logged in and is admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Access denied. Admin access required.');
        }

        $userModel = new UserModel();
        
        if ($userModel->delete($id)) {
            return redirect()->to('/admin/users')
                             ->with('success', 'User deleted successfully!');
        }

        return redirect()->to('/admin/users')
                         ->with('error', 'Failed to delete user.');
    }

    public function courses()
    {
        // Check if user is logged in and is admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Access denied. Admin access required.');
        }

        $data = [
            'title' => 'Manage Courses - Admin',
            'courses' => [] // Will be populated with actual course data
        ];

        return view('admin/courses', $data);
    }

    public function reports()
    {
        // Check if user is logged in and is admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Access denied. Admin access required.');
        }

        $data = [
            'title' => 'Reports - Admin',
            'reports' => [] // Will be populated with actual report data
        ];

        return view('admin/reports', $data);
    }

    public function settings()
    {
        // Check if user is logged in and is admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login')->with('error', 'Access denied. Admin access required.');
        }

        $data = [
            'title' => 'Settings - Admin',
        ];

        return view('admin/settings', $data);
    }
}
