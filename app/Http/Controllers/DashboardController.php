<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index()
    {
        return view('admin.dashboard', ['page_title' => 'Dashboard']);
    }

    public function user()
    {
        return view('users', ['page_title' => 'Profile']);
    }
}
