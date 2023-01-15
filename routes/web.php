<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;
use App\http\Controllers\User\ApplyJobController;
use App\http\Controllers\User\SavedJobsController;
use App\http\Controllers\User\SavedSearchesController;
use App\http\Controllers\User\AppliedJobsController;
use App\http\Controllers\User\ReviewJobsController;

use App\Http\Controllers\JobListController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('/', function () {
     return view('user.welcome');
     //return view('seek.index');
 });

Route::get('profile/me/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users', 'verified'])->name('dashboard');

Route::get('/mypage', function(){
    return view('private.mypage');
})->middleware('auth')->name('profileme');


// ログインなしでアクセス可能なルート設定
Route::get('/', [JobListController::class, 'index'])->name('seek.index');
Route::get('jobs', [JobListController::class, 'search'])->name('seek.list');
Route::get('jobs/{id}', [JobListController::class, 'show'])->name('seek.show');

Route::middleware('auth:users')->group(function () {
// プロフィール登録関連
Route::get('profile/me/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('profile/me/create', [ProfileController::class, 'storePersonalDetail'])->name('profile.store.personal');
Route::get('profile/me/create/career', [ProfileController::class, 'createCareer'])->name('profile.career.create');
Route::post('profile/me/create/career', [ProfileController::class, 'storeCareer'])->name('profile.career.store');
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

require __DIR__.'/auth.php';
