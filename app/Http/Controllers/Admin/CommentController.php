<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('admin.comment.index');
    }

    public function show(string $id)
    {
        return view('admin.comment.show');
    }

    public function answer(Request $request, string $id)
    {

    }

    public function destroy(string $id)
    {

    }

    public function status(int $status)
    {

    }
}
