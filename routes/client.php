<?php

use App\Http\Controllers\client\MeetingController;
use App\Http\Controllers\client\ServiceRequestController;
use App\Http\Controllers\client\DashboardController;
use App\Http\Controllers\client\DealController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\Auth\AuthenticatedClientController;
use App\Http\Controllers\Client\Auth\RegisteredClientController;
use App\Http\Controllers\Client\ProfileController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::prefix('client')->name('client.')->group(function () {
    Route::get('register', [RegisteredClientController::class, 'create'])->name('register');
    Route::post('register', [RegisteredClientController::class, 'store']);

    Route::get('login', [AuthenticatedClientController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedClientController::class, 'store']);

    // Route::post('logout', [AuthenticatedClientController::class, 'destroy'])->name('logout');



    Route::middleware('auth:client')->group(function () {
        Route::get('dashboard', action: [DashboardController::class, 'index'])->name('dashboard');
        Route::get('profile', action: [ProfileController::class, 'show'])->name('profile');
        Route::post('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('profile/password', [ProfileController::class, 'updatePassword'])->name('updatePassword');
        Route::post('logout', [AuthenticatedClientController::class, 'destroy'])->name('logout');
        Route::get('deal', [DealController::class, 'index'])->name('deal.index');
        Route::get('deal/{id}', [DealController::class, 'show'])->name('deal.show');
        Route::get('request', [ServiceRequestController::class, 'index'])->name('request.index');
        Route::post('request/store', [ServiceRequestController::class, 'store'])->name('request.store');
        Route::get('meeting', [MeetingController::class, 'index'])->name('meeting.index');
         Route::get('meeting/calendar', [MeetingController::class, 'calendar'])->name('meeting.calendar');




    });
});










require __DIR__ . '/auth.php';
