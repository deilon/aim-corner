<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function login() {
        return view('authentication/Login');
    }

    public function authenticateUsers(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
    
            return redirect()->intended('/feed/all/posts');
        }
    
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->withInput();
    }
}
