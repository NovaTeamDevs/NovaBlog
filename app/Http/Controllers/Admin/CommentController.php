<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::paginate();
        return view('admin.comment.index', compact('comments'));
    }

    public function show(string $id)
    {
        return view('admin.comment.show');
    }

    public function answer(Request $request, string $id) {}

    public function destroy(string $id) {}

    public function status(int $status) {}
}
