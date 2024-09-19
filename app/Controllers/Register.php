<?php

namespace App\Controllers;

use \App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        // echo view('common/header');
        return view('register');
        // echo view('common/footer');
    }

    public function do_register()
    {
        $userModel = new UserModel();

        // Define validation rules
        $rules = [
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]',
            'cpassword' => 'matches[password]',
            'mobile' => 'required|numeric'
        ];

        if ($this->validate($rules)) {
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $mobile = $this->request->getPost('mobile');

            // Validate input
            if (is_string($password) && !empty($password)) {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            } else {
                // Handle error: password is not valid
                return redirect()->back()->with('error', 'Invalid password.');
            }

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword,
                'Mobile_Number' => $mobile
            ];

            $r = $userModel->insert($data);
            if ($r) {
                // return redirect()->to('/success'); // Redirect to a success page
                $session=session();
                $session->set("success_message","User registered successfully");
                $session->markAsFlashdata('success_message');
                return redirect()->back();
            } else {
                return redirect()->back()->with('error', 'Error during registration');
            }
         
        } else {
            // Validation failed
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}
