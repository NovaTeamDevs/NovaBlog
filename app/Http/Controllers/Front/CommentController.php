<?php

namespace App\Http\Controllers\Front;

use App\Enum\CommentStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => auth()->user()->id,
            'email' => auth()->user()->email,
            'full_name' => auth()->user()->full_name,
            'comment' => $request->comment,
            'status' => CommentStatusEnum::Pending,
            'parent_id' => $request->parent_id ?? null,
        ]);

        $slug = Post::find($request->post_id)->slug;

        return to_route('post', $slug);
    }
}
