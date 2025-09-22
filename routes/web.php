<?php
use App\Http\Controllers\backend\AccountController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\CandidateController;
use App\Http\Controllers\backend\CareerController;
use App\Http\Controllers\backend\ClientController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\DealController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\ExpenseController;
use App\Http\Controllers\backend\ExpenseSourceController;
use App\Http\Controllers\backend\IncomeController;
use App\Http\Controllers\backend\IncomeSourceController;
use App\Http\Controllers\backend\InterviewController;
use App\Http\Controllers\backend\InvoiceController;
use App\Http\Controllers\backend\MeetingController;
use App\Http\Controllers\backend\PaymentController;
use App\Http\Controllers\backend\TransferController;
use App\Http\Controllers\backend\WordController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\ServiceController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.home');
// });

// Route::get('/dashboard', function () {

// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', [DashboardController::class, 'statistics'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    //Route::get('/service', [ServiceController::class, ''])->name('profile.edit');
    //Clients
    // Route::resource('/client', controller: ClientController::class);
    //Blogs
    Route::resource('admin/blog', BlogController::class);
    Route::post('admin/blog/toggle-status', [BlogController::class, 'toggleStatus'])->name('blog.toggleStatus');
    Route::delete('/blogs/{blog}/image', [BlogController::class, 'deleteImage'])->name('blogs.deleteImage');
    //Services
    Route::resource('/admin/service', ServiceController::class);
    //Account
    Route::resource('admin/account', AccountController::class);
    Route::post('admin/account/toggle-status', [AccountController::class, 'toggleStatus'])->name('account.toggleStatus');

    //Cadidate
    Route::resource('admin/candidate', CandidateController::class);
    Route::post('admin/candidate/{id}/toggle-hired', [CandidateController::class, 'toggleHired']);

    //Career
    Route::resource('admin/career', CareerController::class);
    Route::post('admin/careers/{id}/toggle-active', [CareerController::class, 'toggleActive']);
    Route::post('admin/careers/{id}/toggle-published', [CareerController::class, 'togglePublished']);

    //Client
    Route::resource('admin/client', ClientController::class);
    //Invoice
    Route::resource('admin/invoice', InvoiceController::class);
    Route::get('/clients/{id}/deals', [InvoiceController::class, 'getClientDeals'])->name('clients.deals');
    //Deal
    Route::resource('admin/deal', DealController::class);
    // Route::post('admin/deal/from-request/{serviceRequest}', [DealController::class, 'createFromServiceRequest'])->name('deals.create.fromRequest');
    Route::get('/get-service-request-data/{id}', [DealController::class, 'getServiceRequestData']);
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
    Route::get('/candidates/by-career/{careerId}', [InterviewController::class, 'getCandidatesByCareer']);

    // Route::get('/get-candidates-by-career/{careerId}', [InterviewController::class, 'getCandidatesByCareer']);
    //Meeting
    Route::resource('admin/meeting', MeetingController::class);

    Route::get('/meetings/calendar', [MeetingController::class, 'calendar'])->name('meetings.calendar');

    Route::post('/meetings/ajax-store', [MeetingController::class, 'ajaxStore'])->name('meetings.ajaxStore');

    Route::patch('/meetings/ajax-update/{meeting}', [MeetingController::class, 'ajaxUpdate'])->name('meetings.ajaxUpdate');

    //Payment
    Route::resource('admin/payment', PaymentController::class);
    //Transfer
    Route::resource('admin/transfer', TransferController::class);
    //Word
    Route::resource('admin/word', WordController::class);
    //Contact
    // Route::resource('/contact', ContactController::class);
    //Job Application
    Route::resource('admin/application', \App\Http\Controllers\backend\JobApplicationController::class);
    Route::post('/job-applications/{id}/promote-to-candidate', [\App\Http\Controllers\backend\JobApplicationController::class, 'promoteToCandidate'])->name('job_applications.promote');

    //Service Request
    Route::resource('admin/service-request', \App\Http\Controllers\backend\ServiceRequestController::class);
    //Approved Request
    Route::get('admin/deals/create-from-request/{service_request}', [DealController::class, 'createFromRequest'])->name('deals.create.fromRequest');

    route::get('admin/users', function () {
        return view('admin.page');
    })->name('users.index');

});

require __DIR__ . '/auth.php';
