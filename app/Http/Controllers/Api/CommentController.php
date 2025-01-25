<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Enum\CommentStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ChangeStatusCommentRequest;
use App\Http\Resources\CommentResource;
use App\Http\Requests\Api\CreateCommentRequest;

class CommentController extends Controller
{
    public function index(Request $request, string $post_id)
    {
        $comments = Comment::where('post_id', $post_id)
            ->where('status', CommentStatusEnum::Approved)
            ->paginate($request->filled('per_page') ? $request->per_page : 15);

        return CommentResource::collection($comments);
    }

    public function store(CreateCommentRequest $request, string $post_id)
    {
        $post = Post::where('id', $post_id)->first();

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'پستی با این آیدی یافت نشد'
            ], 404);
        }

        $inputs = $request->validated();

        $inpust['user_id'] = auth()->id();
        $inpust['full_name'] = auth()->user()->full_name;
        $inpust['email'] = auth()->user()->email;

        $comment = $post->comments()->create($inputs);

        return CommentResource::make($comment);
    }

    public function allComments(Request $request)
    {
        $comments = Comment::paginate($request->filled('per_page') ? $request->per_page : 15);
        return CommentResource::collection($comments);
    }

    public function changeStatus(ChangeStatusCommentRequest $request, string $comment_id)
    {
        $comment = Comment::where('id', $comment_id)->first();

        if (!$comment) {
            return response()->json([
                'success' => false,
                'message' => 'نظری با این آیدی یافت نشد'
            ], 404);
        }

        $comment->update([
            'status' => $request->validated('status'),
        ]);

        return CommentResource::make($comment);
    }

    public function destroy(string $comment_id)
    {
        $comment = Comment::where('id', $comment_id)->first();

        if (!$comment) {
            return response()->json([
                'success' => false,
                'message' => 'نظری با این آیدی یافت نشد'
            ], 404);
        }

        if (!is_null($comment->answer)) {
            foreach ($comment->answer as $answer) {
                $answer->delete();
            }
        }

        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'نظر با موفقیت حذف شد'
        ]);
    }
}
