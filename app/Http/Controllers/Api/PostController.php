<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use Maize\Markable\Models\Like;
use Maize\Markable\Models\Bookmark;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;

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

    public function likeDislike(string $id)
    {
        $post = Post::where('id', $id)->first();

        if (!$post) {
            return response()->json([
                'message' => 'پست یافت نشد.'
            ], 404);
        }

        $user = auth()->user();

        if (Like::has($post, $user)) {
            Like::remove($post, $user);
        } else {
            Like::add($post, $user);
        }

        return response()->json([
            'success' => true,
            'message' => 'لایک و یا دیسلایک انجام شد.'
        ]);
    }

    public function bookmarkUnbookmark(string $id)
    {
        $post = Post::where('id', $id)->first();

        if (!$post) {
            return response()->json([
                'message' => 'پست یافت نشد.'
            ], 404);
        }

        $user = auth()->user();

        if (Bookmark::has($post, $user)) {
            Bookmark::remove($post, $user);
        } else {
            Bookmark::add($post, $user);
        }

        return response()->json([
            'success' => true,
            'message' => 'بوکمارک و یا برداشتن بوکمارک انجام شد.'
        ]);
    }
}
