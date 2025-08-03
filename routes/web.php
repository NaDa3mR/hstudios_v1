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
    Route::resource('/admin/service', ServiceController::class);
    //Account
    Route::resource('admin/account', AccountController::class);
    Route::post('admin/account/toggle-status', [AccountController::class, 'toggleStatus'])->name('account.toggleStatus');

    //Cadidate
    Route::resource('/candidate', CandidateController::class);
    //Career
    Route::resource('admin/career', CareerController::class);
    Route::post('admin/careers/{id}/toggle-active', [CareerController::class, 'toggleActive']);
    Route::post('admin/careers/{id}/toggle-published', [CareerController::class, 'togglePublished']);

    //Client
    Route::resource('admin/client', ClientController::class);
    //Deal
    Route::resource('admin/deal', DealController::class);
    //Employee
    Route::resource('admin/employee', EmployeeController::class);
    //Expense
    Route::resource('admin/expense', ExpenseController::class);
    //Expense Source
    Route::resource('admin/ex-source', ExpenseSourceController::class);
    Route::post('admin/ex-source/toggle-status', [ExpenseSourceController::class, 'toggleStatus'])->name('ex-source.toggleStatus');
    //Income
    Route::resource('admin/income', IncomeController::class);
    //Income Source
    Route::resource('admin/in-source', IncomeSourceController::class);
    Route::post('admin/in-source/toggle-status', [IncomeSourceController::class, 'toggleStatus'])->name('in-source.toggleStatus');
    //Interview
    Route::resource('admin/interview', InterviewController::class);
    //Meeting
    Route::resource('admin/meeting', MeetingController::class);
    //Payment
    Route::resource('admin/payment', PaymentController::class);
    //Transfer
    Route::resource('admin/transfer', TransferController::class);
    //Word
    Route::resource('admin/word', WordController::class);
    //Contact
    Route::resource('admin/contact', ContactController::class);
    //Job Application
    Route::resource('admin/job-app', JobApplicationController::class);
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

require __DIR__ . '/auth.php';
