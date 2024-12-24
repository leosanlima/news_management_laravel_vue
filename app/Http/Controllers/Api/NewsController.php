<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 6);

        return News::with('category')
            ->latest()
            ->paginate($perPage);
    }

    public function search(Request $request)
    {
        $query = $request->get('search');

        $perPage = $request->query('per_page', 6);

        return News::with('category')
            ->where('title', 'like', "%{$query}%")
            ->orWhereHas('category', function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->latest()
            ->paginate($perPage);
    }

    public function show($id)
    {
        $news = News::with('category')->findOrFail($id);

        return response()->json($news);
    }
}