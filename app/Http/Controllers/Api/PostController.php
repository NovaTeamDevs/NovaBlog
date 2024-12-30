<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use Maize\Markable\Models\Like;
use Maize\Markable\Models\Bookmark;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\PostCreateRequest;
use App\Http\Requests\Api\PostUpdateRequest;
use App\Services\UploadService\UploadService;

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

    public function store(PostCreateRequest $request, UploadService $uploadService)
    {
        $inputs = $request->validated();

        if ($request->hasFile('image')) {
            $result = $uploadService->folder('posts')->upload($request->file('image'));

            if (!$result) {
                return response()->json([
                    'success' => false,
                    'message' => 'مکشلی در آپلود تصویر پیش آمده است'
                ], 400);
            }

            $inputs['image'] = $result;
        }

        $post = Post::create($inputs);

        return response()->json([
            'success' => true,
            'message' =>  'پست جدید با موفقیت ایجاد شد',
            'data' => PostResource::make($post)
        ]);
    }

    public function update(PostUpdateRequest $request, string $id, UploadService $uploadService)
    {
        $post = Post::where('id', $id)->first();

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'پستی با این آیدی یافت نشد'
            ], 404);
        }

        $inputs = $request->validated();

        if ($request->hasFile('image')) {
            if (!empty($post->image)) {
                $uploadService->delete($post->image);
            }

            $result = $uploadService->folder('posts')->upload($request->file('image'));

            if (!$result) {
                return response()->json([
                    'success' => false,
                    'message' => 'مکشلی در آپلود تصویر پیش آمده است'
                ], 400);
            }

            $inputs['image'] = $result;
        }

        $post->update($inputs);

        return response()->json([
            'success' => true,
            'message' =>  'پست با موفقیت ویرایش شد',
            'data' => PostResource::make($post)
        ]);
    }

    public function destroy(string $id, UploadService $uploadService)
    {
        $post = Post::where('id', $id)->first();

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'پستی با این آیدی یافت نشد'
            ], 404);
        }

        if (!empty($post->image)) {
            $uploadService->delete($post->image);
        }

        $post->delete();

        return response()->json([
            'success' => true,
            'message' =>  'پست با موفقیت حذف شد',
        ]);
    }
}