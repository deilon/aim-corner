<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;

class FeedController extends Controller
{
    //
    public function index(Post $posts, $post) {
        
        if ($post != 'all') {
            $users = User::where('role', $post)->get();
            $data['posts'] = Post::whereBelongsTo($users)->get();
            // return dd($data);
            return view('feed', $data);
        }
        
        $data['posts'] = Post::orderBy('created_at', 'desc')->get();
        return view('feed', $data);
    
    }

    // public function studentsPosts() {
    //     $users = User::where('role', 'student')->get();
    //     $data['posts'] = Post::whereBelongsTo($users)->get();
    //     // return dd($data);
    //     return view('feed', $data);
    // }

}
