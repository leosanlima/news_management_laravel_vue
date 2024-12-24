<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::with('category')->latest();

        if ($request->has('search')) {
            $search = $request->get('search');            
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhereHas('category', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->has('category') && $request->get('category')) {
            $query->where('category_id', $request->get('category'));
        }

        $categories = Category::all();
        $news = $query->paginate(5)->withQueryString();

        return view('news.index', compact('news', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('news.create', compact('categories'));
    }

    public function store(NewsRequest $request): RedirectResponse
    {
        News::create($request->validated());

        return redirect()->route('admin.news.index')
            ->with('success', 'Notícia criada com sucesso.');
    }

    public function edit(News $news): View
    {
        $categories = Category::all();
        return view('news.edit', compact('news', 'categories'));
    }

    public function update(NewsRequest $request, News $news): RedirectResponse
    {
        $news->update($request->validated());

        return redirect()->route('admin.news.index')
            ->with('success', 'Notícia atualizada com sucesso.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')
            ->with('success', 'Notícia removida com sucesso.');
    }
}