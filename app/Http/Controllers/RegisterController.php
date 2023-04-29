<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function studentRegister() {
        return view('authentication/StudentRegister');
    }

    public function instructorRegister() {
        return view('authentication/InstructorRegister');
    }
}
