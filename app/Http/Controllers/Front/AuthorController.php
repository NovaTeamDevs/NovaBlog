<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show(User $user)
    {
        $pageTitle = 'نوا بلاگ - آشیو نوسنده';
        $posts = Post::where('user_id', $user->id)
                     ->orderByDesc('updated_at')
                     ->paginate(12);
        $user_name = $user->full_name;
        return view('front.author', compact('pageTitle', 'posts', 'user_name'));
    }
}
