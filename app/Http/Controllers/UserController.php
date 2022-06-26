<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        $user = Auth::user();
        $request->validate([
            'username' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'firstname' => 'required',
            'lastname' => 'required',
            'city' => 'required',
            'country' => 'required',
            'photo' => 'sometimes|required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|'
        ]);

        if ($request->file("photo") != null) {
            $photo_name = time().'_'.$request->file("photo")->getClientOriginalName();
            $request->file('photo')->storeAs('public/images/', $photo_name);
            
        }

        $user = Auth::user();
        $user->username = $request['username'];
        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        $user->city = $request['city'];
        $user->country = $request['country'];
        if ($request->file("photo") != null) {
            $user->photo = $photo_name;
        }
        $user->save();

        return ($request->file("photo") != null) ? 
        back()->with('status','Profile Updated')->with('dp_upload', 'The profile photo has been uploaded but due to free hosting limitation we are unable to preview your photo at the moment.') :
        back()->with('status','Profile Updated');
        ;
    }
}
