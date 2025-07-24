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
        $posts     = Post::orderByDesc('updated_at')
                         ->take(6)
                         ->get();
        return view('front.index', compact('pageTitle', 'posts'));
    }

    public function archive()
    {
        $pageTitle = 'نوا بلاگ - آرشیو مقالات';
        $posts     = Post::orderByDesc('updated_at')
                         ->paginate(12);
        return view('front.archive', compact('pageTitle', 'posts'));
    }

    public function search(Request $request)
    {
        $pageTitle = 'نوا بلاگ - جستجو برای ' . $request->get('q');
        $posts     = Post::whereAny(
                            ['title', 'content', 'tags'],
                            'like',
                            '%' . $request->get('q') . '%'
                        )->orderByDesc('updated_at')
                         ->paginate(12);
        return view('front.search', compact('pageTitle', 'posts'));
    }

    public function postDetail(Post $slug)
    {
        $pageTitle = '';
        return view('front.post-detail', compact('pageTitle'));
    }
}
