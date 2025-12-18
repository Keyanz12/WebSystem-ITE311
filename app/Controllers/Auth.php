<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Database;

class auth extends Controller
{
    public function login()
{
    if(session()->get('logged_in')) {
        return redirect()->to('/dashboard');

    }

    helper(['form']);
    $session = session();

    if($this->request->is('post')) {
        $rules = [
            'email'    => [
                'label'  => 'Email Address',
                'rules'  => 'required|valid_email|regex_match[/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/]',
                'errors' => [
                    'regex_match' => 'The {field} format is invalid.',
                    'required' => 'Please enter your {field}.'
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required|min_length[8]|max_length[255]|regex_match[/^(?!.*[\*"]).+$/]',
                'errors' => [
                    'regex_match' => 'The {field} cannot contain * or ".' ,
                    'required' => 'Please enter your {field}.'
                ]
            ],
        ];

        if(!$this->validate($rules)) {
            // Save validation errors to flashdata and redirect
            $session->setFlashdata('validation_errors', $this->validator->listErrors());
            return redirect()->to('/login')->withInput(); // keep old input
        } 

        // Validation passed, check authentication
        $db = \Config\Database::connect();
        $user = $db->table('users')
                   ->where('email', $this->request->getVar('email'))
                   ->get()
                   ->getRow();

        if(!$user) {
            $session->setFlashdata('error', 'Email not found.');
            return redirect()->to('/login')->withInput();
        }

        if(!password_verify($this->request->getVar('password'), $user->password)) {
            $session->setFlashdata('error', 'Incorrect password.');
            return redirect()->to('/login')->withInput();
        }

        // Successful login
        $sessionData = [
            'user_id'    => $user->id,
            'user_email' => $user->email,
            'user_role'  => $user->role,
            'user_status' => $user->status,
            'logged_in'  => true,
        ];
        $session->set($sessionData);
        return redirect()->to('/dashboard');
    }

    // First time visit or GET request
    return view('auth/login');
}


 public function register(){
    helper(['form']);
    $data = [];

    if(session()->get('logged_in')) {
        return redirect()->to('/dashboard');

    }

    if($this->request->is('post')) {
        $rules = [
            'firstname' => [
                'label'  => 'Full Name',
                'rules'  => 'required|min_length[3]|max_length[50]|regex_match[/^[A-Za-z\s]+$/]',
                'errors' => [
                    'regex_match' => 'The {field} can only contain letters and spaces.',
                    'required' => 'Please enter your {field}.'
                ]
            ],
            'email' => [
                'label'  => 'Email Address',
                'rules'  => 'required|valid_email|is_unique[users.email]|regex_match[/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/]',
                'errors' => [
                    'regex_match' => 'The {field} format is invalid.',
                    'is_unique' => 'That email is already taken.',
                    'required' => 'Please enter your {field}.'
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required|min_length[8]|max_length[255]|regex_match[/^(?!.*[\*"]).+$/]',
                'errors' => [
                    'regex_match' => 'The {field} cannot contain * or ".',
                    'required' => 'Please enter your {field}.'
                ]
            ],
            'password_confirm' => [
                'label' => 'Confirm Password',
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'The {field} does not match the Password.'
                ]
            ],
            'terms' => [
                'label' => 'Terms and Conditions',
                'rules' => 'required',
                'errors' => [
                    'required' => 'You must agree to the terms and privacy.'
                ]
            ]
        ];

        if(!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            return view('auth/register', $data);
        } 

        // Insert user
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->insert([
            'name' => $this->request->getVar('firstname'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => 'student'
        ]);

        return redirect()->to('/login');
    }

    return view('auth/register', $data);
}


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function dashboard()
    {
        // Ensure user is logged in
        $session = session();
        if(!$session->get('logged_in')) {
            session()->setFlashdata('error_log', 
            'Please log in to access the dashboard.');
            return redirect()->to('/login');
        }
        
        if($session->get('user_status') === 'restricted') {
            session()->setFlashdata('error_log', 'Your account is restricted. Please contact the administrator.');
            return redirect()->to('/restricted');
        }

        return view('auth/dashboard');
    }
}