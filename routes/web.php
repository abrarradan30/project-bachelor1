<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BalasanDiskusiController;
use App\Http\Controllers\CekProgresController;
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
use App\Http\Controllers\InputSertifikatController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\KuisFrontController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProgresBelajarController;
use App\Http\Controllers\ProgresMateriController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RatingFrontController;
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

// peran admin, siswa dan mentor
Route::middleware(['peran:admin-siswa-mentor'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');

    // route checkout
    Route::get('/checkout/show/{id}', [CheckoutController::class, 'show']);

    // route modul
    Route::get('/modul', [ModulController::class, 'index']);
    Route::get('/modul/show/{id}', [ModulController::class, 'show']);

    // route forum 
    Route::get('/forum', [ForumController::class, 'index']);
    Route::get('/forum_balas/show/{id}', [ForumController::class, 'show']);
    Route::post('/forum/store', [ForumController::class, 'store']);
    Route::post('/forum_balas/store_balas', [ForumController::class, 'store_balas']);

    Route::post('/forum/update/{id}', [ForumController::class, 'update']);
    
});

// peran admin dan mentor
Route::middleware(['peran:admin-mentor'])->group(function () {
    
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
    Route::get('/progres_belajar/create', [ProgresBelajarController::class, 'create']);
    Route::post('/progres_belajar/store', [ProgresBelajarController::class, 'store']);
    Route::get('/progres_belajar/show/{id}', [ProgresBelajarController::class, 'show']);
    Route::get('/progres_belajar/edit/{id}', [ProgresBelajarController::class, 'edit']);
    Route::post('/progres_belajar/update', [ProgresBelajarController::class, 'update']);
    Route::get('/progres_belajar/delete/{id}', [ProgresBelajarController::class, 'destroy']);

    // route progres belajar
    Route::get('/cek_progres', [CekProgresController::class, 'index']);
    Route::get('/cek_progres/show/{id}', [CekProgresController::class, 'show']);

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

    // route rating
    Route::get('/rating', [RatingController::class, 'index']);
    Route::get('/rating/create', [RatingController::class, 'create']);
    Route::post('/rating/store', [RatingController::class, 'store']);
    Route::get('/rating/show/{id}', [RatingController::class, 'show']);
    Route::get('/rating/edit/{id}', [RatingController::class, 'edit']);
    Route::post('/rating/update', [RatingController::class, 'update']);
    Route::get('/rating/delete/{id}', [RatingController::class, 'destroy']);

     // route sertifikat
     Route::get('/sertifikat', [SertifikatController::class, 'index']);
     Route::get('/sertifikat/create', [SertifikatController::class, 'create']);
     Route::post('/sertifikat/store', [SertifikatController::class, 'store']);
     Route::get('/sertifikat/show/{id}', [SertifikatController::class, 'show']);
     Route::get('/sertifikat/edit/{id}', [SertifikatController::class, 'edit']);
     Route::post('/sertifikat/update', [SertifikatController::class, 'update']);
     Route::get('/sertifikat/delete/{id}', [SertifikatController::class, 'destroy']);
 
     //Route Sertifikat PDF
     Route::get('/cetak/{id}', [FillPDFController::class, 'process']);
 
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
});

// peran admin
Route::middleware(['peran:admin'])->group(function () {
    
    // route user
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('/user/update', [UserController::class, 'update']);

    // route pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index']);
    Route::get('/pembayaran/create', [PembayaranController::class, 'create']);
    Route::post('/pembayaran/store', [PembayaranController::class, 'store']);
    Route::get('/pembayaran/show/{id}', [PembayaranController::class, 'show']);
    Route::get('/pembayaran/edit/{id}', [PembayaranController::class, 'edit']);
    Route::post('/pembayaran/update', [PembayaranController::class, 'update']);
    Route::get('/pembayaran/delete/{id}', [PembayaranController::class, 'destroy']);

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
// route contact 
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact/store', [ContactController::class, 'store']);

// route progres_materi
Route::get('/progres_materi', [ProgresMateriController::class, 'index']);
Route::get('/progres_materi/show/{id}', [ProgresMateriController::class, 'show']);

Route::get('/soal_kuis', [KuisFrontController::class, 'index']);
Route::get('/soal_kuis/show/{id}', [KuisFrontController::class, 'show']);

// route rating front
Route::get('/ratingfe', [RatingFrontController::class, 'index']);
Route::get('/ratingfe/create', [RatingFrontController::class, 'create']);
Route::post('/ratingfe/store', [RatingFrontController::class, 'store']);

// route rating front
Route::get('/input_sertifikat', [InputSertifikatController::class, 'index']);
Route::get('/input_sertifikat/create/{id}', [InputSertifikatController::class, 'create']);
Route::post('/input_sertifikat/store', [InputSertifikatController::class, 'store']);
Route::get('/input_sertifikat/show/{id}', [InputSertifikatController::class, 'show']);

Route::get('/acces_denied', function () {
    return view('/acces_denied');
});

Route::get('/after_register', function () {
    return view('/after_register');
});

//Route::post('/buat', [FillPDFController::class, 'process'])->name('buat');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
