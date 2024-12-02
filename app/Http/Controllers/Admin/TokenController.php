<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function index()
    {
        return view('admin.token.index');
    }

    public function create()
    {
        return view('admin.token.create');
    }

    public function store(Request $request)
    {

    }

    public function destroy(string $id)
    {

    }
}
