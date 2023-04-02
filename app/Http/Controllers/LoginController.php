<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

}
