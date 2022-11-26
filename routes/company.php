<?php

use App\Http\Controllers\Company\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Company\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Company\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Company\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Company\Auth\NewPasswordController;
use App\Http\Controllers\Company\Auth\PasswordResetLinkController;
use App\Http\Controllers\Company\Auth\RegisteredUserController;
use App\Http\Controllers\Company\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Company\ProfileController;
use App\Http\Controllers\Company\ActiveJobOffersController;
use App\Http\Controllers\Company\PostJobsController;
use App\Http\Controllers\Company\AppliedJobSeekersController;
use App\Http\Controllers\Company\AccountController;
use App\Http\Controllers\Company\PostedJobOffersController;

Route::get('/dashboard', function () {
    return view('company.dashboard');
})->middleware(['auth:companies', 'verified'])->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth:companies')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

    // 企業プロフィールに関する操作
    Route::get('profile/create',    [ProfileController::class, 'create'])->name('profile.create');
    Route::post('profile/create',   [ProfileController::class, 'firstPost'])->name('profile.first');
    Route::get('profile/createSecond',    [ProfileController::class, 'createSecond'])->name('profile.createSecond');
    Route::post('profile/createSecond',   [ProfileController::class, 'secondPost'])->name('profile.second');
    Route::get('profile/confirm',    [ProfileController::class, 'confirm'])->name('profile.confirm');
    Route::post('profile/confirm',   [ProfileController::class, 'store'])->name('profile.store');
    Route::post('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('delete-me',  [AccountController::class, 'create'])->name('accout.create');
    Route::post('delete-me', [AccountController::class, 'destroy'])->name('accout.destroy');
    
    // 掲載中の求人に関する操作
    Route::get('job-offers/active-job-list', [ActiveJobOffersController::class, 'index'])->name('active.job.offers');
    Route::get('job-offers/active-job/{id}/show', [ActiveJobOffersController::class, 'show'])->name('active.job.detail');
    Route::post('job-offers/pause-a-job/{id}/pause', [PostedJobOffersController::class, 'pause'])->name('active.job.pause');
    Route::post('job-offers/destroy-a-job/{id}', [PostedJobOffersController::class, 'destroy'])->name('active.job.destroy');
    Route::get('job-offers/edit-a-job/{id}', [PostedJobOffersController::class, 'edit'])->name('job.edit');
    Route::post('job-offers/edit-a-job/{id}', [PostedJobOffersController::class, 'update'])->name('job.update');

    // 応募者に関する操作
    Route::get('job-seekers/applied', [AppliedJobSeekersController::class, 'index'])->name('applied.job.seekers');
    Route::get('job-seekers/applied/{id}}', [AppliedJobSeekersController::class, 'show'])->name('applied.job.seeker.detail');

    // 求人投稿に関する操作
    Route::get('post-a-job', [PostJobsController::class, 'create'])->name('post.job.create');
    Route::post('post-a-job', [PostJobsController::class, 'store'])->name('post.job.store');

});
