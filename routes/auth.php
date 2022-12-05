<?php

use App\Http\Controllers\User\Auth\AuthenticatedSessionController;
use App\Http\Controllers\User\Auth\ConfirmablePasswordController;
use App\Http\Controllers\User\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\User\Auth\EmailVerificationPromptController;
use App\Http\Controllers\User\Auth\NewPasswordController;
use App\Http\Controllers\User\Auth\PasswordResetLinkController;
use App\Http\Controllers\User\Auth\RegisteredUserController;
use App\Http\Controllers\User\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\ProfileController;
use App\http\Controllers\User\ApplyJobController;
use App\http\Controllers\User\SavedJobsController;
use App\http\Controllers\User\SavedSearchesController;
use App\http\Controllers\User\AppliedJobsController;
use App\http\Controllers\User\ReviewJobsController;

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

Route::middleware('auth:users')->group(function () {
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

    // プロフィール登録関連
    Route::get('profile/me/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('profile/me/create', [ProfileController::class, 'store'])->name('profile.store');
    ROute::get('profile/me/create/career', [ProfileController::class, 'createCareer'])->name('profile.career');
    Route::post('profile/me/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // 求人応募関連
    Route::get('jobs/detail/{id}/apply-a-job', [ApplyJobController::class, 'create'])->name('apply.job.create');
    Route::post('jobs/detail/{id}/apply-a-job', [ApplyJobController::class, 'store'])->name('apply.job.store');

    // お気に入り保存求人関連 ※後ほど実装
    Route::get('my-activity/saved-jobs', [SavedJobsController::class, 'index'])->name('saved.jobs.index');
    Route::get('my-activity/saved-jobs/{id}', [SavedJobsController::class, 'show'])->name('saved.jobs.show');
    Route::post('my-activity/saved-jobs/{id}/destroy', [SavedJobsController::class, 'destroy'])->name('saved.jobs.destroy');
    Route::post('my-activity/saved-jobs', [SavedJobsController::class, 'store'])->name('saved.jobs.store');

    // お気に入り検索条件関連 ※後ほど実装
    Route::get('my-activity/saved-searches', [SavedSearchesController::class, 'index'])->name('saved.searaches.index');
    Route::get('my-activity/saved-searches', [SavedSearchesController::class, 'search'])->name('saved.searaches.search');
    Route::post('my-activity/saved-searches', [SavedSearchesController::class, 'store'])->name('saved.searaches.store');
    Route::post('my-activity/saved-searches/{id}/destroy', [SavedSearchesController::class, 'destroy'])->name('saved.searaches.destroy');

    // 応募済み求人関連
    Route::get('my-activity/applied-jobs', [AppliedJobsController::class, 'index'])->name('applied.jobs.index');
    Route::get('my-activity/applied-jobs/{id}/show', [AppliedJobsController::class, 'show'])->name('applied.jobs.show');
    Route::post('my-activity/applied/{id}/destroy', [AppliedJobsController::class, 'destroy'])->name('applied.jobs.destroy');

    // レビュー投稿関連
    Route::get('leave-a-review', [ReviewJobsController::class, 'create'])->name('leave.review.create');
    Route::post('leave-a-review', [ReviewJobsController::class, 'store'])->name('leave.review.store');
});
