<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            'photo' => ['sometimes', 'image', 'max:2048']
        ], ['username.regex' => 'Invalid username.']);

        // Store update
        $user = Auth::user();
        $user->firstname = strtolower($request->firstname);
        $user->lastname = strtolower($request->lastname);
        $user->middlename = strtolower($request->middlename);
        $user->username = strtolower($request->username);
        $user->email = strtolower($request->email);

        // Save photo file
        if(!empty($request->file('photo'))) {
            $oldPhoto = $user->photo;
            $image = $request->file('photo');
            $filename = $image->hashName();
            $imagePath = $image->storeAs('public/profile_pic', $filename);
            $user->photo = $filename;

            // Delete the old profile picture file from the storage disk to save space
            if (!empty($oldPhoto)) {
                Storage::delete('public/profile_pic/' . $oldPhoto);
            }
        }

        $user->save();

        // redirect
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
