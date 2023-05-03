<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function profile() {
        $data['user'] = Auth::user();
        return view('profile', $data);
    }

    /**
     * Update existing profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(Request $request)
    {
        // Validate and update the user...
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'middlename' => ['sometimes', 'nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'username' => ['required', 'string', 'max:255','regex:/^(?!.*\.\.)(?!.*\.$)(?!.*\.\d)(?!.*\.$)[^\W][\w.]{0,29}$/', Rule::unique('users')->ignore(Auth::user()->id)],
            // 'photo' => 'sometimes|required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|'
        ], ['username.regex' => 'Invalid username.']);

        // if ($request->file("photo") != null) {
        //     $photo_name = time().'_'.$request->file("photo")->getClientOriginalName();
        //     $request->file('photo')->storeAs('public/images/', $photo_name);
            
        // }

        $user = Auth::user();
        $user->firstname = strtolower($request->firstname);
        $user->lastname = strtolower($request->lastname);
        $user->middlename = strtolower($request->middlename);
        $user->username = strtolower($request->username);
        $user->email = strtolower($request->email);
        // if ($request->file("photo") != null) {
        //     $user->photo = $photo_name;
        // }
        $user->save();

        // return ($request->file("photo") != null) ? 
        // back()->with('status','Profile Updated')->with('dp_upload', 'The profile photo has been uploaded but due to free hosting limitation we are unable to preview your photo at the moment.') :
        // back()->with('status','Profile Updated');
        // ;

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function changePasswordView() {
        $data['user'] = Auth::user();
        return view('change_password', $data);
    }

    public function changePassword(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).+$/'],
        ], [
            'password.regex' => 'Your password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.'
        ]);
    
        $user = Auth::user();
    
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided password does not match your current password.']);
        }
    
        $user->update([
            'password' => Hash::make($request->password),
        ]);
    
        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}
