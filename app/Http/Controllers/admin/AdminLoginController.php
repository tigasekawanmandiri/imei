<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index() {
        return view('admin.adminlogin');
    }

    public function login_submit (Request $request) {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

    if (Auth::attempt($credential)) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('admin.login')->with('error', 'Email / Password Salah');
    }
    }
}
