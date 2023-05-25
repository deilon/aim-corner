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
        $credentials = $request->only('user', 'password');
        $loginField = filter_var($credentials['user'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $validatedCredentials = [
            $loginField => $credentials['user'],
            'password' => $credentials['password'],
        ];

        if (Auth::attempt($validatedCredentials, $request->has('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/feed/all');
        }

        return back()->withErrors([
            'error_login' => 'Invalid credentials. Please check your username/email and password.',
        ])->withInput();
    }
}
