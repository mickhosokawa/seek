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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/mypage', function(){
    return view('private.mypage');
})->middleware('auth')->name('profileme');


// ログインなしでアクセス可能なルート設定
Route::get('/', [JobListController::class, 'index'])->name('seek.index');
Route::get('/jobs', [JobListController::class, 'search'])->name('jobs');
Route::get('/jobs/{id}', [JobListController::class, 'show'])->name('seek.show');

require __DIR__.'/auth.php';
