<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin/dashboard');
});

Route::get('/user', function () {
    return view('admin/user/index');
});

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

Route::get('/front', function () {
    return view('front');
});