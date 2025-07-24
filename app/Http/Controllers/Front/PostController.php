<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $pageTitle = 'نوا بلاگ - وبلاگ با لاراول';
        $posts = Post::orderByDesc('updated_at')
                     ->take(6)
                     ->get();
        return view('front.index', compact('pageTitle', 'posts'));
    }

    public function archive()
    {
        $pageTitle = '';
        return view('front.archive', compact('pageTitle'));
    }

    public function search(Request $request)
    {
        $pageTitle = '';
        return view('front.search', compact('pageTitle'));
    }

    public function postDetail(Post $slug)
    {
        $pageTitle = '';
        return view('front.post-detail', compact('pageTitle'));
    }
}
