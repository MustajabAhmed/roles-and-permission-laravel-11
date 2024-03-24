<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;

class BaseController extends UserController
{
    public function __construct()
    {
        parent::__construct(); 
    }

    public function home()
    {
        return redirect('user/dashboard');
    }

    public function index()
    {
        // return view('user.index');
        return view('index');
    }
}
