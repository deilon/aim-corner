<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function studentLogin() {
        return view('authentication/StudentLogin');
    }
    public function instructorLogin() {
        return view('authentication/InstructorLogin');
    }
    public function adminLogin() {
        return view('authentication/AdminLogin');
    }

    public function authenticateStudent(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('feed/all/posts');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
