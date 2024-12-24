<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CategoryController
 * 
 * @package App\Http\Controllers\Api
 */
class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(): Collection
    {
        return Category::all();
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Models\Category
     */
    public function store(Request $request): Category
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return Category::create($validated);
    }

    /**
     * Display the specified category.
     *
     * @param  \App\Models\Category  $category
     * @return \App\Models\Category
     */
    public function show(Category $category): Category
    {
        return $category;
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \App\Models\Category
     */
    public function update(Request $request, Category $category): Category
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($validated);
        return $category;
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {
        $category->delete();
        return response()->noContent();
    }
}