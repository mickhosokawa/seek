<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jobListController;

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

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users', 'verified'])->name('dashboard');

Route::get('/mypage', function(){
    return view('private.mypage');
})->middleware('auth')->name('profileme');


// ログインなしでアクセス可能なルート設定
Route::get('/', [JobListController::class, 'index'])->name('seek.index');
Route::get('/jobs', [JobListController::class, 'search'])->name('seek.jobs');
Route::get('/jobs/{id}', [JobListController::class, 'show'])->name('seek.show');

require __DIR__.'/auth.php';
