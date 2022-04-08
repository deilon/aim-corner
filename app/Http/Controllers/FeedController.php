<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class FeedController extends Controller
{
    //
    public function index(Post $posts) {

        $data['posts'] = $posts->all(); 
        return view('feed', $data);
    
    }


}
