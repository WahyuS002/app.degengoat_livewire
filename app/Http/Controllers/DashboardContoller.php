<?php

namespace App\Http\Controllers;

class DashboardContoller extends Controller
{
    public function index()
    {
         return view('dashboard');
    }
}
