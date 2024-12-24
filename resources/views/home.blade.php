@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-center mb-8">Latest News</h1>
        
        <div class="grid gap-6">
            @foreach($news as $article)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $article->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ Str::limit($article->content, 200) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $article->category->name }}</span>
                        <span class="text-sm text-gray-500">{{ $article->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection