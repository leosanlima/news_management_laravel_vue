@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-8">Dashboard</h1>
        
        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Categorias</h2>
                <p class="mb-4">Gerenciar Categorias</p>
                <a href="{{ route('admin.categories.index') }}" 
                   class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Listar Categorias
                </a>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Notícias</h2>
                <p class="mb-4">Gerenciar Notícias</p>
                <a href="{{ route('admin.news.index') }}" 
                   class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Listar Notícias
                </a>
            </div>
        </div>
    </div>
</div>
@endsection