<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForumDiskusiController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');

Route::get('/profil', function () {
    return view('admin/profil/index');
});

//route user
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update', [UserController::class, 'update']);

Route::get('/materi', function () {
    return view('admin/materi/index');
});

Route::get('/detail_materi', function () {
    return view('admin/detail_materi/index');
});

Route::get('/progres_belajar', function () {
    return view('admin/progres_belajar/index');
});

Route::get('/forum_diskusi', function () {
    return view('admin/forum_diskusi/index');
});

Route::get('admin/forum_diskusi/create', function () {
    return view('admin/forum_diskusi/create');
});

Route::resource('forum_diskusi', ForumDiskusiController::class);
Route::get('/front', function () {
    return view('front');
});