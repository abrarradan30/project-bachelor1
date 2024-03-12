<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BalasanDiskusiController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseDetailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailMateriController;
use App\Http\Controllers\ForumDiskusiController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HasilKuisController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProgresBelajarController;
use App\Http\Controllers\SertifikatController;
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

// route user
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update', [UserController::class, 'update']);

// route materi
Route::get('/materi', [MateriController::class, 'index']);
Route::get('/materi/create', [MateriController::class, 'create']);
Route::post('/materi/store', [MateriController::class, 'store']);
Route::get('/materi/show/{id}', [MateriController::class, 'show']);
Route::get('/materi/edit/{id}', [MateriController::class, 'edit']);
Route::post('/materi/update', [MateriController::class, 'update']);
Route::get('/materi/delete/{id}', [MateriController::class, 'destroy']);

// route detail_materi
Route::get('/detail_materi', [DetailMateriController::class, 'index']);
Route::get('/detail_materi/create', [DetailMateriController::class, 'create']);
Route::post('/detail_materi/store', [DetailMateriController::class, 'store']);
Route::get('/detail_materi/show/{id}', [DetailMateriController::class, 'show']);
Route::get('/detail_materi/edit/{id}', [DetailMateriController::class, 'edit']);
Route::post('update/{id}', [DetailMateriController::class, 'update']);
Route::get('/detail_materi/delete/{id}', [DetailMateriController::class, 'destroy']);

// route progres belajar
Route::get('/progres_belajar', [ProgresBelajarController::class, 'index']);

// route kuis
Route::get('/kuis', [KuisController::class, 'index']);
Route::get('/kuis/create', [KuisController::class, 'create']);
Route::post('/kuis/store', [KuisController::class, 'store']);
Route::get('/kuis/show/{id}', [KuisController::class, 'show']);
Route::get('/kuis/edit/{id}', [KuisController::class, 'edit']);
Route::post('update/{id}', [KuisController::class, 'update']);
Route::get('/kuis/delete/{id}', [KuisController::class, 'destroy']);

// route hasil_kuis
Route::get('/hasil_kuis', [HasilKuisController::class, 'index']);
Route::get('/hasil_kuis/create', [HasilKuisController::class, 'create']);

// route sertifikat
Route::get('/sertifikat', [SertifikatController::class, 'index']);

// route forum diskusi
Route::get('/forum_diskusi', [ForumDiskusiController::class, 'index']);
Route::get('/forum_diskusi/create', [ForumDiskusiController::class, 'create']);
Route::get('/forum_diskusi/show', [ForumDiskusiController::class, 'show']);

// route balasan diskusi
Route::get('/balasan_diskusi', [BalasanDiskusiController::class, 'index']);
Route::get('/balasan_diskusi/create', [BalasanDiskusiController::class, 'create']);

// route frontend
//route front
Route::get('/front', [FrontController::class, 'index']);
// route about 
Route::get('/about', [AboutController::class, 'index']);
// route course 
Route::get('/course', [CourseController::class, 'index']);
// route course_detail 
Route::get('/course_detail', [CourseDetailController::class, 'index']);
// route contact 
Route::get('/contact', [ContactController::class, 'index']);