<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function storeComment(Request $request, $post_id) {
        $validated = $request->validate([
            'comment' => 'required|string',
        ]);
    
        $comment = new Comment();
        $comment->post_id = $post_id;
        $comment->user_id = auth()->id();
        $comment->comment = $validated['comment'];
        $comment->save();
    
        return redirect()->route('view/post', $post_id)
            ->with('success', 'Comment submitted.');
    }
}
