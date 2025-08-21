<?php

use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\Client\Auth\AuthenticatedClientController;
use App\Http\Controllers\Client\Auth\RegisteredClientController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

// Route::get('/home', function () {
//     return view('frontend.home');
// })->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
         return view('frontend.aboutus');
     })->name('about');

Route::get('/service', [ServiceController::class, 'showAll'])->name('service.showAll');
Route::get('/service/{id}', [ServiceController::class, 'show'])->name('service.show');

Route::get('/blog', [BlogController::class, 'showAll'])->name('blog.showAll');
Route::get('/blog/{id}', [BlogController::class, 'showSingleBlog'])->name('blog.showSingle');

Route::resource('/contact', ContactController::class);

Route::prefix('client')->name('client.')->group(function () {
    Route::get('register', [RegisteredClientController::class, 'create'])->name('register');
    Route::post('register', [RegisteredClientController::class, 'store']);

    Route::get('login', [AuthenticatedClientController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedClientController::class, 'store']);

    Route::post('logout', [AuthenticatedClientController::class, 'destroy'])->name('logout');

    Route::middleware('auth:client')->group(function () {
        Route::get('profile', [ProfileController::class, 'show'])->name('profile');
    });
});
require __DIR__ . '/auth.php';
