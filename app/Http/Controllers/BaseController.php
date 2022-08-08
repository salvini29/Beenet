<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function landing()
    {
        return view('index');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
}
