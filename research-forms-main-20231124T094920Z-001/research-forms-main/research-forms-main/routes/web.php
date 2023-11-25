<?php

use App\Http\Controllers\FormApprovalController;
use App\Http\Controllers\SubmissionStatusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResearchFormController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\ToggleActivityController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', WelcomeController::class)->name('welcome')->middleware('guest');

Route::resource('staff', StaffController::class)->middleware(['auth', 'role:admin']);

Route::resource('students', StudentController::class)->middleware('auth');

Route::put('/submissions/{submission}/change-approval', FormApprovalController::class)
    ->name('submissions.change-approval')
    ->middleware(['auth', 'role:admin']);

Route::get('/research-forms/submissions', [SubmissionController::class, 'index'])
    ->name('research-forms.submissions.index')
    ->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::post(
        '/submissions/{submission}/change-status',
        SubmissionStatusController::class
    )->name('submissions.change-status');

    Route::get(
        '/research-forms/{research_form}/submissions/create',
        [SubmissionController::class, 'create']
    )->name('research-forms.submissions.create');

    Route::post(
        '/research-forms/{research_form}/submissions/create',
        [SubmissionController::class, 'store']
    );

    Route::get(
        '/students/{student}/research-forms/{research_form}/submissions',
        [SubmissionController::class, 'show']
    )->name('research-forms.submissions.show');

    Route::get(
        '/research-forms/{research_form}/submissions/edit',
        [SubmissionController::class, 'edit']
    )->name('research-forms.submissions.edit');
});

Route::resource('research-forms', ResearchFormController::class)
    ->middleware(['auth', 'role:student']);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::post('/login', [SessionController::class, 'store'])->name('login');
});

Route::post('/logout', [SessionController::class, 'destroy'])
    ->name('logout');

Route::post('/reset-password', ResetPasswordController::class)
    ->name('reset-password')
    ->middleware(['auth', 'role:admin']);

Route::post('/toggle-activity', ToggleActivityController::class)
    ->name('toggle-activity')
    ->middleware(['auth', 'role:admin']);

Route::get('/home', HomeController::class)->middleware('auth');
