<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $pageTitle = 'نوا بلاگ - آرشیو دسته بندی ' . $category->name;
        return view('front.category', compact('pageTitle', 'category'));
    }
}
