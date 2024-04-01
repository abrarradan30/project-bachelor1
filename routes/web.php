<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BalasanDiskusiController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseDetailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailMateriController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ForumDiskusiController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HasilKuisController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProgresBelajarController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FillPDFController;

use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/profil', [ProfilController::class, 'index']);
Route::get('/profil/edit/{id}', [ProfilController::class, 'edit']);
Route::post('/profil/update', [ProfilController::class, 'update']);

Route::middleware(['peran:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    
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
    Route::post('detail_materi/update/{id}', [DetailMateriController::class, 'update']);
    Route::get('/detail_materi/delete/{id}', [DetailMateriController::class, 'destroy']);

    // route progres belajar
    Route::get('/progres_belajar', [ProgresBelajarController::class, 'index']);

    // route kuis
    Route::get('/kuis', [KuisController::class, 'index']);
    Route::get('/kuis/create', [KuisController::class, 'create']);
    Route::post('/kuis/store', [KuisController::class, 'store']);
    Route::get('/kuis/show/{id}', [KuisController::class, 'show']);
    Route::get('/kuis/edit/{id}', [KuisController::class, 'edit']);
    Route::post('kuis/update/{id}', [KuisController::class, 'update']);
    Route::get('/kuis/delete/{id}', [KuisController::class, 'destroy']);

    // route hasil_kuis
    Route::get('/hasil_kuis', [HasilKuisController::class, 'index']);
    Route::get('/hasil_kuis/create', [HasilKuisController::class, 'create']);
    Route::post('/hasil_kuis/store', [HasilKuisController::class, 'store']);
    Route::get('/hasil_kuis/show/{id}', [HasilKuisController::class, 'show']);
    Route::get('/hasil_kuis/edit/{id}', [HasilKuisController::class, 'edit']);
    Route::post('/hasil_kuis/update', [HasilKuisController::class, 'update']);
    Route::get('/hasil_kuis/delete/{id}', [HasilKuisController::class, 'destroy']);

    // route sertifikat
    Route::get('/sertifikat', [SertifikatController::class, 'index']);

    // route forum diskusi
    Route::get('/forum_diskusi', [ForumDiskusiController::class, 'index']);
    Route::get('/forum_diskusi/create', [ForumDiskusiController::class, 'create']);
    Route::post('/forum_diskusi/store', [ForumDiskusiController::class, 'store']);
    Route::get('/forum_diskusi/show/{id}', [ForumDiskusiController::class, 'show']);
    Route::get('/forum_diskusi/edit/{id}', [ForumDiskusiController::class, 'edit']);
    Route::post('forum_diskusi/update/{id}', [ForumDiskusiController::class, 'update']);
    Route::get('/forum_diskusi/delete/{id}', [ForumDiskusiController::class, 'destroy']);

    // route balasan diskusi
    Route::get('/balasan_diskusi', [BalasanDiskusiController::class, 'index']);
    Route::get('/balasan_diskusi/create', [BalasanDiskusiController::class, 'create']);
    Route::post('/balasan_diskusi/store', [BalasanDiskusiController::class, 'store']);
    Route::get('/balasan_diskusi/show/{id}', [BalasanDiskusiController::class, 'show']);
    Route::get('/balasan_diskusi/edit/{id}', [BalasanDiskusiController::class, 'edit']);
    Route::post('balasan_diskusi/update/{id}', [BalasanDiskusiController::class, 'update']);
    Route::get('/balasan_diskusi/delete/{id}', [BalasanDiskusiController::class, 'destroy']);

    // route checkout
    Route::get('/checkout/show/{id}', [CheckoutController::class, 'show']);
});

// route frontend
//route front
Route::get('/', [FrontController::class, 'index']);
// route about 
Route::get('/about', [AboutController::class, 'index']);
// route course 
Route::get('/course', [CourseController::class, 'index']);
// route course_detail 
Route::get('/course_detail', [CourseDetailController::class, 'index']);
Route::get('/course_detail/show/{id}', [CourseDetailController::class, 'show']);
// route checkout 
Route::get('/checkout', [CheckoutController::class, 'index']);
// route contact 
Route::get('/contact', [ContactController::class, 'index']);
// route forum 
Route::get('/forum', [ForumController::class, 'index']);

Route::get('/acces_denied', function () {
    return view('/acces_denied');
});

Route::get('/after_register', function () {
    return view('/after_register');
});

Route::get('/course2', function () {
    return view('/course2');
});

//Route Sertifikat PDF
Route::get('/buat', [FillPDFController::class, 'process']);
//Route::post('/buat', [FillPDFController::class, 'process'])->name('buat');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
