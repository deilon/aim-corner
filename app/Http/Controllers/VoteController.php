<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Vote;

class VoteController extends Controller
{

    public function vote(Request $request)
    {
        $post = Post::findOrFail($request->input('post_id'));
        $voteType = $request->input('vote_type');
    
        if ($voteType === 'upvote') {
            // check if voted
            if (Auth::user()->votes()->where('post_id', $post->id)->exists()) {
                // User has already voted, so remove the vote
                Auth::user()->votes()->where('post_id', $post->id)->delete();
            } else {
                // if not voted, vote
                $vote = new Vote;
                $vote->vote = 1;
                $vote->user_id = Auth::user()->id;
                $vote->post_id = $post->id;
                $vote->save();    
            }
        } elseif ($voteType === 'downvote') {
            // check if voted
            if (Auth::user()->votes()->where('post_id', $post->id)->exists()) {
                // User has already voted, so remove the vote
                Auth::user()->votes()->where('post_id', $post->id)->delete();
            } else {
                // if not voted, vote
                $vote = new Vote;
                $vote->vote = -1;
                $vote->user_id = Auth::user()->id;
                $vote->post_id = $post->id;
                $vote->save();    
            }
        }
    
        $voteCount = $post->votes()->sum('vote');
    
        return response()->json([
            'vote_count' => $voteCount
        ]);
    }

}
