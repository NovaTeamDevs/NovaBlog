<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::paginate($request->filled('per_page') ? $request->per_page : 15);
        return CategoryResource::collection($categories);
    }

    public function getData(string $id)
    {
        $category = Category::where('id', $id)->first();

        if(!$category){
            return response()->json([
                'message' => 'دسته بندی یافت نشد.'
            ], 404);
        }

        return CategoryResource::make($category);
    }
}
