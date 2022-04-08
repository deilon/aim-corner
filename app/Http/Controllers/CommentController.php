<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function createComment(Request $request) {
        $user = Auth::user();

        // Validate
        $request->validate([
            'comment' => 'required'
        ]);

        $comment = new Comment;
        $comment->user_id = $user->id;
        // $comment->post_id = $comment->post->id;
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;
        $comment->save();
        return back()->with('status', 'A comment has been made.');     

    }
}
