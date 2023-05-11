<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Save;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class SaveController extends Controller
{
    //
    public function save(Request $request)
    {
        if (Auth::user()->saves()->where('post_id', $request->input('post_id'))->exists()) {
            // if post has already been saved, unsave
            Auth::user()->saves()->where('post_id', $request->input('post_id'))->delete();

            return response()->json(['unsave' => true]);
        } else {
            // save
            $save = new Save;
            $save->user_id = Auth::user()->id;
            $save->post_id = $request->input('post_id');
            $save->save();   

            return response()->json(['save' => true]);
        }

        // return back();
    }



}
