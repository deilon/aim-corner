<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //
    public function index() {
        return view('post');
    }

    public function createTitlePost(Request $request) 
    {
        // Validate
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'text' => 'nullable|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Store
        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $request->input('title');
        $post->text = $request->input('description');
        $post->type = 'title';
        $post->save();
    
        // Redirect
        $request->session()->flash('success', 'Your post has been made.');
        return redirect('feed/all/posts');
    }

    public function createImagePost(Request $request)
    {
        // Define validation rules
        $rules = [
            'title' => ['required'],
            'text' => ['nullable'],
            'image' => ['required', 'image', 'max:2048'],
        ];

        // Run validation
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Validation passed, so create new post
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->type = 'photo';

        // Save image file
        $image = $request->file('image');
        $filename = $image->hashName();
        $imagePath = $image->storeAs('public/post_images', $filename);
        $post->image = $filename;
        
        $post->save();

        // Redirect
        $request->session()->flash('success', 'Your post has been made.');
        return redirect('feed/all/posts');
    }

    public function createLinkPost(Request $request)
    {
        // Validate
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'link' => 'required|url',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Store
        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $request->input('title');
        $post->link = $request->input('link');
        $post->type = 'link';
        $post->save();
    
        // Redirect
        $request->session()->flash('success', 'Your post has been made.');
        return redirect('feed/all/posts');
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
            $post->type = "link";
        }
        elseif ($request->file("image") != null) {
            $post->image = $photo_name;
            $post->type = "photo";
        } else {
            $post->text = $request['text'];
            $post->type = "title";
        }
        $post->save();

        return ($request->file("image") != null) ? 
        back()->with('status', 'A post has been made.')->with('post_upload', 'The photo attached to the post has been uploaded but due to free hosting limitation we are unable to preview your photo at the moment.') : 
        back()->with('status', 'A post has been made.');        
    }


    public function viewPost($post_id) {
        $data['post'] = Post::find($post_id);
        return view("post_show", $data);
    }

}

