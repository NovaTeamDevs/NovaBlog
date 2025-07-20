<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function archive()
    {
        return view('front.archive');
    }

    public function search(Request $request)
    {
        return view('front.search');
    }

    public function postDetail(Post $slug)
    {
        return view('front.post-detail');
    }
}
