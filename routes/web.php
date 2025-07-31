<?php

use App\Http\Controllers\backend\AccountController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\CandidateController;
use App\Http\Controllers\backend\CareerController;
use App\Http\Controllers\backend\ClientController;
use App\Http\Controllers\backend\DealController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\ExpenseController;
use App\Http\Controllers\backend\ExpenseSourceController;
use App\Http\Controllers\backend\IncomeController;
use App\Http\Controllers\backend\IncomeSourceController;
use App\Http\Controllers\backend\InterviewController;
use App\Http\Controllers\backend\MeetingController;
use App\Http\Controllers\backend\PaymentController;
use App\Http\Controllers\backend\TransferController;
use App\Http\Controllers\backend\WordController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\JobApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\frontend\ServiceRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function () {
    return view('admin.user');
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
    Route::resource('admin/blog', BlogController::class);
    Route::post('admin/blog/toggle-status', [BlogController::class, 'toggleStatus'])->name('blog.toggleStatus');
    //Services
    Route::resource('/service', ServiceController::class); //
    //Account
    Route::resource('/account', AccountController::class);
    //Cadidate
    Route::resource('/candidate', CandidateController::class);
    //Career
    Route::resource('/career', CareerController::class);
    //Client
    Route::resource('/client', ClientController::class);
    //Deal
    Route::resource('/deal', DealController::class);
    //Employee
    Route::resource('/employee', EmployeeController::class);
    //Expense
    Route::resource('/expense', ExpenseController::class);
    //Expense Source
    Route::resource('/ex-source', ExpenseSourceController::class);
    //Income
    Route::resource('/income', IncomeController::class);
    //Income Source
    Route::resource('/in-source', IncomeSourceController::class);
    //Interview
    Route::resource('/interview', InterviewController::class);
    //Meeting
    Route::resource('/meeting', MeetingController::class);
    //Payment
    Route::resource('/payment', PaymentController::class);
    //Transfer
    Route::resource('/transfer', TransferController::class);
    //Word
    Route::resource('/word', WordController::class);
    //Contact
    Route::resource('/contact', ContactController::class);
    //Job Application
    Route::resource('/job-app', JobApplicationController::class);
    //Service Request
    // Route::resource('/service', ServiceController::class);
    //Approved Request
    Route::post('/service-request/approve-request/{id}', [ServiceRequestController::class, 'ApproveRequest'])->name('service_request.approve_request');
    //Approved Request
    Route::resource('/service-req', ServiceRequestController::class);

    route::get('admin/users', function () {
        return view('admin.page');
    })->name('users.index');

});

require __DIR__.'/auth.php';
