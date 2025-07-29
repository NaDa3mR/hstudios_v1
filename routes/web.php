<?php

use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\frontend\ServiceRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Route::get('/service', [ServiceController::class, ''])->name('profile.edit');
    //Clients
    Route::resource('/client', ClientController::class);
    //Blogs
    Route::resource('/blog', BlogController::class);
    //Services
    Route::resource('/service', ServiceController::class);
    //Approved Request
    Route::post('/service-request/approve-request/{id}', [ServiceRequestController::class, 'ApproveRequest'])->name('service_request.approve_request');

               
});

require __DIR__.'/auth.php';
