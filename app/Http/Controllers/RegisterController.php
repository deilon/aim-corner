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
            'course' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'role' => ['string', 'max:255', 'default:student'],
        ], [
            'username.regex' => 'Invalid username.',
            'password.regex' => 'Your password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.'
        ]);

        $user = User::create([
            'username' => strtolower($request->username),
            'email' => strtolower($request->email),
            'password' => Hash::make(strtolower($request->password)),
            'firstname' => strtolower($request->firstname),
            'lastname' => strtolower($request->lastname),
            'middlename' => strtolower($request->middlename),
            'course' => strtolower($request->course),
            'country' => strtolower($request->country),
            'city' => strtolower($request->city),
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
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'role' => ['string', 'max:255', 'default:instructor'],
        ], [
            'username.regex' => 'Invalid username.',
            'password.regex' => 'Your password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.'
        ]);

        $user = User::create([
            'username' => strtolower($request->username),
            'email' => strtolower($request->email),
            'password' => Hash::make(strtolower($request->password)),
            'firstname' => strtolower($request->firstname),
            'lastname' => strtolower($request->lastname),
            'middlename' => strtolower($request->middlename),
            'country' => strtolower($request->country),
            'city' => strtolower($request->city),
            'role' => 'instructor',
        ]);

        event(new Registered($user));

        $request->session()->flash('welcome_message', 'Welcome, ' . $user->firstname . '! Your account has been created.');

        Auth::login($user);

        return redirect('feed/all/posts');
    }
    
}
