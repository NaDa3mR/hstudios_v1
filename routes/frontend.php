<?php

use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

// Route::get('/home', function () {
//     return view('frontend.home');
// })->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/service', [ServiceController::class, 'showAll'])->name('service.showAll');
Route::get('/service/{id}', [ServiceController::class, 'show'])->name('service.show');

Route::get('/blog', [BlogController::class, 'showAll'])->name('blog.showAll');
Route::get('/blog/{id}', [BlogController::class, 'showSingleBlog'])->name('blog.showSingle');

Route::resource('/contact', ContactController::class);


require __DIR__ . '/auth.php';
