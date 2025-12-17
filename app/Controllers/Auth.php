<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function new()
    {
        helper(['form']);
        return view('auth/register');
    }

    public function create()
    {
        helper(['form']);
        $users = new UserModel();

        // CSRF Protection
        $csrfToken = $this->request->getPost('csrf_test_name');
        if (!$csrfToken || $csrfToken !== csrf_hash()) {
            return redirect()->back()->with('error', 'Security token mismatch. Please try again.');
        }

        // Input validation and sanitization
        $data = [
            'name'         => htmlspecialchars(trim($this->request->getPost('name')), ENT_QUOTES, 'UTF-8'),
            'email'        => filter_var(trim($this->request->getPost('email')), FILTER_SANITIZE_EMAIL),
            'password'     => $this->request->getPost('password'),
            'pass_confirm' => $this->request->getPost('pass_confirm'),
            'role'         => $this->request->getPost('role'),
        ];

        // Additional validation
        if (!in_array($data['role'], ['admin', 'teacher', 'student'])) {
            return redirect()->back()
                             ->withInput()
                             ->with('error', 'Invalid role selected.');
        }

        // Password strength validation
        if (strlen($data['password']) < 8) {
            return redirect()->back()
                             ->withInput()
                             ->with('error', 'Password must be at least 8 characters long.');
        }

        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $data['password'])) {
            return redirect()->back()
                             ->withInput()
                             ->with('error', 'Password must contain at least one uppercase letter, one lowercase letter, and one number.');
        }

        if (!$users->save($data)) {
            return redirect()->back()
                             ->withInput()
                             ->with('errors', $users->errors())
                             ->with('error', 'Registration failed. Please check your input.');
        }

        return redirect()->to('/register/success')
                         ->with('success', 'Account created successfully!');
    }

    public function success()
    {
        return view('register_success');
    }

    public function index()
    {
        helper(['form', 'url']);
        return view('auth/login');
    }

    public function auth()
    {
        $session = session();
        $users   = new UserModel();

        // CSRF Protection
        $csrfToken = $this->request->getPost('csrf_test_name');
        if (!$csrfToken || $csrfToken !== csrf_hash()) {
            return redirect()->back()->with('error', 'Security token mismatch. Please try again.');
        }

        // Input validation and sanitization
        $email    = filter_var(trim($this->request->getPost('email')), FILTER_SANITIZE_EMAIL);
        $password = $this->request->getPost('password');

        // Rate limiting check (basic implementation)
        $loginAttempts = $session->get('login_attempts', 0);
        $lastAttemptTime = $session->get('last_attempt_time', 0);
        
        if ($loginAttempts >= 5 && (time() - $lastAttemptTime) < 300) { // 5 minutes lockout
            return redirect()->back()->with('error', 'Too many login attempts. Please try again in 5 minutes.');
        }

        // Database query with parameter binding to prevent SQL injection
        $user = $users->where('email', $email)->first();

        if ($user) {
            // Password verification with timing attack protection
            if (password_verify($password, $user['password'])) {
                // Reset login attempts on successful login
                $session->remove('login_attempts');
                $session->remove('last_attempt_time');
                
                // Regenerate session ID to prevent session fixation
                $session->regenerate();
                
                $sessionData = [
                    'id'         => $user['id'],
                    'name'       => $user['name'],
                    'email'      => $user['email'],
                    'role'       => $user['role'],
                    'isLoggedIn' => true,
                    'login_time' => time(),
                ];
                $session->set($sessionData);

                return redirect()->to('/dashboard');
            } else {
                // Increment failed attempts
                $session->set('login_attempts', $loginAttempts + 1);
                $session->set('last_attempt_time', time());
                
                return redirect()->back()->with('error', 'Invalid credentials.');
            }
        } else {
            // Increment failed attempts
            $session->set('login_attempts', $loginAttempts + 1);
            $session->set('last_attempt_time', time());
            
            return redirect()->back()->with('error', 'Invalid credentials.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'You have been logged out successfully.');
    }

    public function dashboard()
    {
        // AUTHORIZATION CHECK - ensure user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Please login first');
        }

        $role = session()->get('role');
        $userId = session()->get('id');
        $userName = session()->get('name');
        
        // Map 'user' to 'student' if needed
        if ($role === 'user') {
            $role = 'student';
        }

        // Prepare data for view
        $data = [
            'title' => ucfirst($role) . ' Dashboard',
            'username' => $userName,
            'role' => $role,
            'name' => $userName
        ];

        // Fetch role-specific statistics
        switch ($role) {
            case 'admin':
                $data['stats'] = $this->getAdminStats();
                $data['totalUsers'] = $data['stats']['total_users'];
                $data['totalTeachers'] = $data['stats']['total_teachers'];
                $data['totalStudents'] = $data['stats']['total_students'];
                $data['recentUsers'] = $this->getRecentUsers();
                break;
            case 'teacher':
                $data['stats'] = $this->getTeacherStats($userId);
                $data['totalStudents'] = $data['stats']['total_students'];
                break;
            case 'student':
                $data['stats'] = $this->getStudentStats($userId);
                break;
            default:
                $data['stats'] = [];
        }

        return view('auth/dashboard', $data);
    }

    // Helper method for admin statistics
    private function getAdminStats()
    {
        $db = \Config\Database::connect();
        
        $totalUsers = $db->table('users')->countAll();
        $totalAdmins = $db->table('users')->where('role', 'admin')->countAllResults();
        $totalTeachers = $db->table('users')->where('role', 'teacher')->countAllResults();
        
        // Count both 'user' and 'student' as students
        $totalStudents = $db->table('users')->whereIn('role', ['user', 'student'])->countAllResults();
        
        return [
            'total_users' => $totalUsers,
            'total_admins' => $totalAdmins,
            'total_teachers' => $totalTeachers,
            'total_students' => $totalStudents
        ];
    }

    // Helper method for recent users
    private function getRecentUsers()
    {
        $userModel = new \App\Models\UserModel();
        return $userModel->orderBy('created_at', 'DESC')->findAll(5);
    }

    // Helper method for teacher statistics
    private function getTeacherStats($userId)
    {
        return [
            'total_students' => 120,
            'total_courses' => 5,
            'pending_assignments' => 15
        ];
    }

    // Helper method for student statistics
    private function getStudentStats($userId)
    {
        return [
            'enrolled_courses' => 6,
            'completed_assignments' => 12,
            'pending_assignments' => 3
        ];
    }
}