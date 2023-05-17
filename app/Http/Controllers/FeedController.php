<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Follow;

class FeedController extends Controller
{
    //
    public function index() {        
        $data['posts'] = Post::orderBy('created_at', 'desc')->get();
        return view('feed', $data);
    }

    public function getStudentsPosts() {
        $users = User::where('role', 'student')->get();
        $data['posts'] = Post::whereBelongsTo($users)->orderBy('created_at', 'desc')->get();
        return view('feed', $data);
    }

    public function getInstructorsPosts() {
        $instructors = User::where('role', 'instructor')->orderBy('created_at', 'desc')->get();

        if ($instructors->isEmpty()) {
            $data['posts'] = collect();
        } else {
            $data['posts'] = Post::whereBelongsTo($instructors)->get();
        }
    
        return view('feed', $data);
    }

    public function getAdminsPosts() {
        $admins = User::where('role', 'admin')->orderBy('created_at', 'desc')->get();

        if ($admins->isEmpty()) {
            $data['posts'] = collect();
        } else {
            $data['posts'] = Post::whereBelongsTo($admins)->get();
        }
    
        return view('feed', $data);
    }

    public function getFollowingPosts() {
        $followingIds = auth()->user()->following()->pluck('users.id');
        $posts = Post::whereIn('user_id', $followingIds)->orderBy('created_at', 'desc')->get();
        return view('feed', ['posts' => $posts]);
    }

}
