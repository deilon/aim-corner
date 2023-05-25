<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
{
    public function follow(Request $request, $id)
    {
        $followedUser = User::findOrFail($id);
        
        auth()->user()->following()->attach($followedUser->id);

        return redirect()->back();
    }

    public function unfollow(Request $request, $id)
    {
        $followedUser = User::findOrFail($id);

        auth()->user()->following()->detach($followedUser->id);

        return redirect()->back();
    }
}
