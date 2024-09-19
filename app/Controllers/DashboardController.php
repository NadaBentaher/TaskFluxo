<?php

namespace App\Controllers;
use \App\Models\UserModel;

class Home extends BaseController
{
    public function user()
    {   
        return view('common/header');
        
    }
}
