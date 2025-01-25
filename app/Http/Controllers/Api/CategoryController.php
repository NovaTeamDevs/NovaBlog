<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateCategoryRequest;
use App\Http\Requests\Api\UpdateCategoryRequest;
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

        if (!$category) {
            return response()->json([
                'message' => 'دسته بندی یافت نشد.'
            ], 404);
        }

        return CategoryResource::make($category);
    }

    public function store(CreateCategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return CategoryResource::make($category);
    }

    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::where('id', $id)->first();

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'دسته بندی با این آیدی یافت نشد'
            ], 404);
        }

        $category->update($request->validated());

        return CategoryResource::make($category);
    }

    public function destroy(string $id)
    {
        $category = Category::where('id', $id)->first();

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'دسته بندی با این آیدی یافت نشد'
            ], 404);
        }

        if (!is_null($category->posts) || !is_null($category->children)) {
            return response()->json([
                'success' => false,
                'message' => 'این دسته بندی شامل زیر مجموعه است و امکان حذف ندارد.'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'دسته بندی مورد نظر حذف شد'
        ]);
    }
}
