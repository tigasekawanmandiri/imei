<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index() {

        if(Auth::check()){
            return view('admin.dashboard');
        }
            return redirect()->route('admin.login');

    }
}
