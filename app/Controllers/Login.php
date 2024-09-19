<?php

namespace App\Controllers;

use \App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        // echo view('common/header');
        return view('login');
        // echo view('common/footer');
    }

//     public function do_login()
//     {
//         $userModel = new UserModel();

//         // Define validation rules
//         $rules = [
//             'email' => 'required|valid_email',
//             'password' => 'required|min_length[5]',
//         ];

//         if ($this->validate($rules)) {
//             $email = $this->request->getPost('email');
//             $password = $this->request->getPost('password');

//             // Fetch user based on email
//             $result = $userModel->where('email', $email)->first();

//             // Check if a user was found
//             if ($result) {
//                 // Verify password
//                 if (password_verify($password, $result['password'])) {
//                     $this->session->set("user", $result);
//                     return redirect()->to('/dashboard');
//                 } else {
//                     // Incorrect password
//                     return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
//                 }
//             } else {
//                 // Email not found
//                 return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
//             }
//         } else {
//             // Validation failed
//             return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
//         }
//     }
// }
public function do_login()
{
    $userModel = new UserModel();

    // Define validation rules
    $rules = [
        'email' => 'required|valid_email',
        'password' => 'required|min_length[5]',
    ];

    if ($this->validate($rules)) {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Fetch user based on email
        $result = $userModel->where('email', $email)->first();

        // Check if a user was found
        if ($result && password_verify($password, $result['password'])) {
            // User found and password verified
            $session = session();
            $sess_data = [
                'id' => $result['id'],
                'name' => $result['name'],
                'email' => $result['email'],
                'role' => $result['role'],
                'loginned' => "loginned"
            ];
            $session->set($sess_data);

            // Redirect based on role
            if ($result['role'] === 'admin') {
                return redirect()->to('/admin');
            } elseif ($result['role'] === 'employee') {
                return redirect()->to('/dashboard');
            }
        } else {
            // Invalid email or password
            return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
        }
    } else {
        // Validation failed
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
}

public function logout(){
    $session=session();
    session_unset();
    session_destroy();
    return redirect()->to(base_url());
}
}