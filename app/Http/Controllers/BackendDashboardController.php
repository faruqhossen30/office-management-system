<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendDashboardController extends Controller
{
    public function dashboard(){
        return view('backend.dashboard');
    }

}
