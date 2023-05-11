<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Post;

class DashboardController extends Controller
{
    //

    public function posts() {
        $data['posts'] = Auth::user()->post()->orderBy('created_at', 'desc')->get();
        return view('dashboard/posts', $data);
    }

    public function comments() {
        $user_id = Auth::user()->id;
        $data['posts'] = Post::whereHas('comments', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();        
        return view('dashboard/comments', $data);
    }

    public function saved() {
        $user_id = Auth::user()->id;
        $data['posts'] = Post::whereHas('saves', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();
        return view('dashboard/saved', $data);
    }

    public function upvoted() {
        $user_id = Auth::user()->id;
        $data['posts'] = Post::whereHas('votes', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)->where('vote', 1);
        })->get();
        return view('dashboard/upvoted', $data);
    }

    public function downvoted() {
        $user_id = Auth::user()->id;
        $data['posts'] = Post::whereHas('votes', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)->where('vote', -1);
        })->get();
        return view('dashboard/downvoted', $data);
    }

}
