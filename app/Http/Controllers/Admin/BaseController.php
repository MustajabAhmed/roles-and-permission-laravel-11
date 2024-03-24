<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\AdminController;

class BaseController extends AdminController
{
    public function __construct()
    {
        parent::__construct(); 
    }

    public function home()
    {
        return redirect('admin/dashboard');
    }

    public function index()
    {
        return view('index');
        // return view('admin.index');
    }
}

