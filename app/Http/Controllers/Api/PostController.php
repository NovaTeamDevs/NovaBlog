<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::when($request->filled('search'), function ($query) use ($request) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('tags', 'like', '%' . $request->search . '%')
                ->orWhere('content', 'like', '%' . $request->search . '%');
        })->with(['category', 'author'])->paginate($request->filled('per_page') ? $request->per_page : 15);

        return PostResource::collection($posts);
    }

    public function getData(string $id)
    {
        $post = Post::where('id', $id)->first();

        if (!$post) {
            return response()->json([
                'message' => 'پست یافت نشد.'
            ], 404);
        }

        return PostResource::make($post);
    }

    public function likeDislike(Post $post) {}

    public function bookmarkUnbookmark(Post $post) {}
}
