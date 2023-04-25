<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function posts() {
        return view('dashboard/posts');
    }

    public function comments() {
        return view('dashboard/comments');
    }

    public function saved() {
        return view('dashboard/saved');
    }

    public function upvoted() {
        return view('dashboard/upvoted');
    }

    public function downvoted() {
        return view('dashboard/downvoted');
    }

}
