<?php

namespace App\Controllers;

use \App\Models\UserModel;

class ProfileController extends BaseController
{
    // public function edit()
    // {
    //     $session = session();
    //     $userId = $session->get('id');
        
    //     $userModel = new UserModel();
    //     $user = $userModel->find($userId);

    //     $data = [
    //         'user' => $user
    //     ];

    //     echo view('profile_edit', $data);
    // }
    public function editProfile()
    {
        $userModel = new UserModel();
        $session = session();
        $userId = $session->get('id');
        $user = $userModel->find($userId);

        return view('editing', ['user' => $user]);
    }

    public function changePassword()
    {
        return view('change_password');
    }

    public function updateProfile()
    {
        $userModel = new UserModel();
        $session = session();
        $userId = $session->get('id');

        // Validate and update profile information
        // ...

        $userModel->update($userId, $this->request->getPost());
        return redirect()->to('/profile/edit')->with('success', 'Profile updated successfully.');
    }

    public function updatePassword()
    {
        $userModel = new UserModel();
        $session = session();
        $userId = $session->get('id');

        // Validate and update password
        // ...

        return redirect()->to('/profile/change_password')->with('success', 'Password changed successfully.');
    }
}
