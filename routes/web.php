<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
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

// route detail_materi
Route::get('/detail_materi', [DetailMateriController::class, 'index']);
Route::get('/detail_materi/create', [DetailMateriController::class, 'create']);

// route progres belajar
Route::get('/progres_belajar', [ProgresBelajarController::class, 'index']);

// route forum diskusi
Route::get('/forum_diskusi', [ForumDiskusiController::class, 'index']);
Route::get('/forum_diskusi/create', [ForumDiskusiController::class, 'create']);
Route::get('/forum_diskusi/show', [ForumDiskusiController::class, 'show']);

// route kuis
Route::get('/kuis', [KuisController::class, 'index']);

// route hasil_kuis
Route::get('/hasil_kuis', [HasilKuisController::class, 'index']);

// route sertifikat
Route::get('/sertifikat', [SertifikatController::class, 'index']);


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