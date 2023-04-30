<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function studentRegister() {
        return view('authentication/StudentRegister');
    }

    public function instructorRegister() {
        return view('authentication/InstructorRegister');
    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^(?!.*\.\.)(?!.*\.$)(?!.*\.\d)(?!.*\.$)[^\W][\w.]{0,29}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).+$/'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'middlename' => ['string', 'max:255'],
            'photo' => ['string', 'max:255'],
            'course' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'role' => ['string', 'max:255', 'default:student'],
        ], [
            'username.regex' => 'Invalid username.',
            'password.regex' => 'Your password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.'
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'middlename' => $request->middlename,
            'photo' => 'profile.jpg',
            'course' => $request->course,
            'country' => $request->country,
            'city' => $request->city,
            'role' => 'student',
        ]);

        event(new Registered($user));

        $request->session()->flash('welcome_message', 'Welcome, ' . $user->firstname . '! Your account has been created.');

        Auth::login($user);

        return redirect('feed/all/posts');
    }

    public function storeInstructor(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^(?!.*\.\.)(?!.*\.$)(?!.*\.\d)(?!.*\.$)[^\W][\w.]{0,29}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).+$/'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'middlename' => ['string', 'max:255'],
            'photo' => ['string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'role' => ['string', 'max:255', 'default:instructor'],
        ], [
            'username.regex' => 'Invalid username.',
            'password.regex' => 'Your password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.'
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'middlename' => $request->middlename,
            'photo' => 'profile.jpg',
            'country' => $request->country,
            'city' => $request->city,
            'role' => 'instructor',
        ]);

        event(new Registered($user));

        $request->session()->flash('welcome_message', 'Welcome, ' . $user->firstname . '! Your account has been created.');

        Auth::login($user);

        return redirect('feed/all/posts');
    }
    
}
