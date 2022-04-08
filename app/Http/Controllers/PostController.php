<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index() {
        return view('post');
    }

    public function createPost(Request $request) {

        $user = Auth::user();

        // Validate
        $request->validate([
            'title' => 'required',
            'text' => 'sometimes',
            'image' => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg',
            'link' => 'sometimes|url'
        ]);

        if ($request->file("image") != null) {
            $photo_name = time().'_'.$request->file("image")->getClientOriginalName();
            $request->file('image')->storeAs('public/images/', $photo_name);
        }

        $post = new Post;
        $post->user_id = $user->id;
        $post->title = $request['title'];
        if ($request['link'] != null) {
            $post->link = $request['link'];
            $post->post_type = "link_post";
        }
        elseif ($request->file("image") != null) {
            $post->image = $photo_name;
            $post->post_type = "image_post";
        } else {
            $post->text = $request['text'];
            $post->post_type = "single_post";
        }
        $post->save();
        return back()->with('status', 'A post has been made.');        
    }


    public function viewPost($post_id) {
        $data['post'] = Post::find($post_id);
        return view("post_view", $data);
    }

}

