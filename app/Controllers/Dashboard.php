<?php

namespace App\Controllers;

use \App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $userId = $session->get('id');
        
        // Ensure user is logged in
        if (!$userId) {
            return redirect()->to(base_url('/login')); // Redirect to login if no user ID found in session
        }

        $userModel = new UserModel();
        $user = $userModel->find($userId); // Fetch user data by ID

        // Pass user data to the view
        $data = [
            'user' => $user
        ];

        echo view('dashboard', $data); // Load the view with user data
    }
}
