<?php

namespace App\Controllers;
use \App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {   
        // echo view('common/header');
        return view('home');
        // echo view('common/footer');
    }
    public function about()
    {
        echo view('about');
    }

}
