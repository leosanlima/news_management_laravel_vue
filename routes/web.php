<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('categories', CategoryController::class);
    Route::resource('news', NewsController::class);
});

Route::get('/{any}', function () {
    return view('app'); // Serve a view do Vue.js
})->where('any', '^(?!api|admin|images|css|js|fonts|assets).*');