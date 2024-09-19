<?php

namespace App\Controllers;
use \App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {   
        $data['pageTitle'] = 'Home';
        echo view('Dashboard/home',$data);
    }
    
}
