<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\PermenController;
use App\Http\Controllers\ProjekController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\KoefisienController;
use App\Http\Controllers\JenisbahanController;
use App\Http\Controllers\KontraktorController;
use App\Http\Controllers\DaftarbahanController;
use App\Http\Controllers\HargabahansController;
use App\Http\Controllers\UpahpekerjaController;
use App\Http\Controllers\DaftarpekerjaController;
use App\Http\Controllers\KoefisienpekerjaController;

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


Route::group(['middleware' => ['guest']], function () {
    Route::get('/',[AuthController::class, 'login'])->name('login');
    Route::get('/registrasi',[AuthController::class, 'registrasi'])->name('registrasi');
    Route::post('/post',[AuthController::class, 'post'])->name('login.post');
    Route::post('/store',[AuthController::class, 'store'])->name('registrasi.store');
});

Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/cetak/{id}',[ProjekController::class, 'cetak'])->name('cetak');

Route::group(['middleware' => ['auth', 'role:admin']], function () {
  
    Route::get('/bahan',[DaftarbahanController::class, 'index'])->name('bahan');
    Route::get('/bahan/create',[DaftarbahanController::class, 'create'])->name('bahan.create');
    Route::post('/bahan/store',[DaftarbahanController::class, 'store'])->name('bahan.store');
    Route::get('/bahan/edit/{id}',[DaftarbahanController::class, 'edit'])->name('bahan.edit');
    Route::get('/bahan/delete/{id}',[DaftarbahanController::class, 'destroy'])->name('bahan.delete');
    Route::post('/bahan/update/{id}',[DaftarbahanController::class, 'update'])->name('bahan.update');

    Route::get('/pekerja',[DaftarpekerjaController::class, 'index'])->name('pekerja');
    Route::get('/pekerja/create',[DaftarpekerjaController::class, 'create'])->name('pekerja.create');
    Route::post('/pekerja/store',[DaftarpekerjaController::class, 'store'])->name('pekerja.store');
    Route::get('/pekerja/edit/{id}',[DaftarpekerjaController::class, 'edit'])->name('pekerja.edit');
    Route::get('/pekerja/delete/{id}',[DaftarpekerjaController::class, 'destroy'])->name('pekerja.delete');
    Route::post('/pekerja/update/{id}',[DaftarpekerjaController::class, 'update'])->name('pekerja.update');

    Route::get('/satuan',[SatuanController::class, 'index'])->name('satuan');
    Route::get('/satuan/create',[SatuanController::class, 'create'])->name('satuan.create');
    Route::post('/satuan/store',[SatuanController::class, 'store'])->name('satuan.store');
    Route::get('/satuan/edit/{id}',[SatuanController::class, 'edit'])->name('satuan.edit');
    Route::get('/satuan/delete/{id}',[SatuanController::class, 'destroy'])->name('satuan.delete');
    Route::post('/satuan/update/{id}',[SatuanController::class, 'update'])->name('satuan.update');


    Route::get('/jenisbahan',[JenisbahanController::class, 'index'])->name('jenisbahan');
    Route::get('/jenisbahan/create',[JenisbahanController::class, 'create'])->name('jenisbahan.create');
    Route::post('/jenisbahan/store',[JenisbahanController::class, 'store'])->name('jenisbahan.store');
    Route::get('/jenisbahan/edit/{id}',[JenisbahanController::class, 'edit'])->name('jenisbahan.edit');
    Route::get('/jenisbahan/delete/{id}',[JenisbahanController::class, 'destroy'])->name('jenisbahan.delete');
    Route::post('/jenisbahan/update/{id}',[JenisbahanController::class, 'update'])->name('jenisbahan.update');

    Route::get('/projek',[ProjekController::class, 'index'])->name('projek');
    Route::get('/projek/show/{id}',[ProjekController::class, 'show'])->name('projek.show');
    Route::get('/projek/create',[ProjekController::class, 'create'])->name('projek.create');
    Route::post('/projek/store',[ProjekController::class, 'store'])->name('projek.store');
    Route::get('/projek/edit/{id}',[ProjekController::class, 'edit'])->name('projek.edit');
    Route::get('/projek/delete/{id}',[ProjekController::class, 'destroy'])->name('projek.delete');
    Route::post('/projek/update/{id}',[ProjekController::class, 'update'])->name('projek.update');

    Route::get('/permen',[PermenController::class, 'index'])->name('permen');
    Route::get('/permen/create',[PermenController::class, 'create'])->name('permen.create');
    Route::post('/permen/store',[PermenController::class, 'store'])->name('permen.store');
    Route::get('/permen/edit/{id}',[PermenController::class, 'edit'])->name('permen.edit');
    Route::get('/permen/delete/{id}',[PermenController::class, 'destroy'])->name('permen.delete');
    Route::post('/permen/update/{id}',[PermenController::class, 'update'])->name('permen.update');
    Route::get('/permen/show/{id}',[PermenController::class, 'show'])->name('permen.show');

    Route::get('/permen/jenispekerjaan/create/{id}',[PermenController::class, 'createJenisPekerjaan'])->name('jenispekerjaan.create');
    Route::post('/permen/jenispekerjaan/store/{id}',[PermenController::class, 'storeJenisPekerjaan'])->name('jenispekerjaan.store');
    Route::post('/permen/jenispekerjaan/update/{id}',[PermenController::class, 'updateJenisPekerjaan'])->name('jenispekerjaan.update');
    Route::get('/permen/jenispekerjaan/show/{id}',[PermenController::class, 'showJenisPekerjaan'])->name('jenispekerjaan.show');
    Route::get('/permen/jenispekerjaan/edit/{id}',[PermenController::class, 'editJenisPekerjaan'])->name('jenispekerjaan.edit');
    Route::get('/permen/jenispekerjaan/delete/{id}',[PermenController::class, 'deleteJenisPekerjaan'])->name('jenispekerjaan.delete');

    Route::get('/permen/jenispekerjaan/pekerjaan/create/{id}',[PermenController::class, 'createPekerjaan'])->name('pekerjaan.create');
    Route::post('/permen/jenispekerjaan/pekerjaan/store/{id}',[PermenController::class, 'storePekerjaan'])->name('pekerjaan.store');
    Route::post('/permen/jenispekerjaan/pekerjaan/update/{id}',[PermenController::class, 'updatePekerjaan'])->name('pekerjaan.update');
    Route::get('/permen/jenispekerjaan/pekerjaan/show/{id}',[PermenController::class, 'showPekerjaan'])->name('pekerjaan.show');
    Route::get('/permen/jenispekerjaan/pekerjaan/edit/{id}',[PermenController::class, 'editPekerjaan'])->name('pekerjaan.edit');
    Route::get('/permen/jenispekerjaan/pekerjaan/delete/{id}',[PermenController::class, 'deletePekerjaan'])->name('pekerjaan.delete');

    Route::get('/koefisien/create/{id}',[KoefisienController::class, 'create'])->name('koefisien.create');
    Route::post('/koefisien/store/{id}',[KoefisienController::class, 'store'])->name('koefisien.store');
    Route::post('/koefisien/update/{id}',[KoefisienController::class, 'update'])->name('koefisien.update');
    Route::get('/koefisien/show/{id}',[KoefisienController::class, 'show'])->name('koefisien.show');
    Route::get('/koefisien/edit/{id}',[KoefisienController::class, 'edit'])->name('koefisien.edit');
    Route::get('/koefisien/delete/{id}',[KoefisienController::class, 'destroy'])->name('koefisien.delete');

    Route::get('/koefisienpekerja/create/{id}',[KoefisienpekerjaController::class, 'create'])->name('koefisienpekerja.create');
    Route::post('/koefisienpekerja/update/{id}',[KoefisienpekerjaController::class, 'update'])->name('koefisienpekerja.update');
    Route::post('/koefisienpekerja/store/{id}',[KoefisienpekerjaController::class, 'store'])->name('koefisienpekerja.store');
    Route::get('/koefisienpekerja/edit/{id}',[KoefisienpekerjaController::class, 'edit'])->name('koefisienpekerja.edit');
    Route::get('/koefisienpekerja/delete/{id}',[KoefisienpekerjaController::class, 'destroy'])->name('koefisienpekerja.delete');

    Route::get('/user',[UserController::class, 'index'])->name('user');
    Route::get('/user/create',[UserController::class, 'create'])->name('user.create');
    Route::post('/user/store',[UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}',[UserController::class, 'edit'])->name('user.edit');
    Route::get('/user/delete/{id}',[UserController::class, 'destroy'])->name('user.delete');
    Route::post('/user/update/{id}',[UserController::class, 'update'])->name('user.update');
    Route::get('/user/show/{id}',[UserController::class, 'show'])->name('user.show');

    // // Cetak

    // Route::get('/cetak',[CetakController::class, 'index'])->name('cetak');
    // // golongan
    // Route::get('/golongan',[GolonganController::class, 'index'])->name('golongan');
    // Route::get('/golongan/create',[GolonganController::class, 'create'])->name('golongan.create');
    // Route::post('/golongan/store',[GolonganController::class, 'store'])->name('golongan.store');
    // Route::get('/golongan/edit/{id}',[GolonganController::class, 'edit'])->name('golongan.edit');
    // Route::post('/golongan/update/{id}',[GolonganController::class, 'update'])->name('golongan.update');
    // Route::get('/golongan/delete/{id}',[GolonganController::class, 'destroy'])->name('golongan.delete');


});


Route::group(['middleware' => ['auth', 'role:surveyor']], function () {
    Route::get('/tugas',[TugasController::class, 'index'])->name('tugas');
    
    Route::get('/hargabahan/{id}',[HargabahansController::class, 'index'])->name('hargabahan.index');
    Route::get('/hargabahan/edit/{bahan_id}/{tugas_id}',[HargabahansController::class, 'edit'])->name('hargabahan.edit');
    Route::get('/hargabahan/create/{bahan_id}/{tugas_id}',[HargabahansController::class, 'create'])->name('hargabahan.create');
    Route::get('/hargabahan/delete/{id}',[HargabahansController::class, 'destroy'])->name('hargabahan.delete');
    Route::post('/hargabahan/store/{bahan_id}/{tugas_id}/',[HargabahansController::class, 'store'])->name('hargabahan.store');
    Route::post('/hargabahan/update/{id}',[HargabahansController::class, 'update'])->name('hargabahan.update');

    
    Route::get('/upahpekerja/edit/{id}',[UpahpekerjaController::class, 'edit'])->name('upahpekerja.edit');
    Route::get('/upahpekerja/create/{pekerja_id}/{tugas_id}',[UpahpekerjaController::class, 'create'])->name('upahpekerja.create');
    Route::get('/upahpekerja/delete/{id}',[UpahpekerjaController::class, 'destroy'])->name('upahpekerja.delete');
    Route::post('/upahpekerja/store/{pekerja_id}/{tugas_id}/',[UpahpekerjaController::class, 'store'])->name('upahpekerja.store');
    Route::post('/upahpekerja/update/{id}',[UpahpekerjaController::class, 'update'])->name('upahpekerja.update');

    Route::get('/surveyor-projek',[ProjekController::class, 'viewDaftarProjek'])->name('surveyorprojek');
    Route::get('/surveyor-projek/show/{id}',[ProjekController::class, 'viewProjek'])->name('surveyorprojek.show');
  

});



Route::group(['middleware' => ['auth', 'role:kontraktor']], function () {

    Route::get('/kontraktor',[KontraktorController::class, 'index'])->name('kontraktor');
    Route::get('/kontraktor/store',[KontraktorController::class, 'store'])->name('kontraktor.store');
    Route::get('/kontraktor-projek',[ProjekController::class, 'viewDaftarProjek'])->name('kontraktorprojek');
    Route::get('/kontraktor-projek/show/{id}',[ProjekController::class, 'viewProjek'])->name('kontraktorprojek.show');
  

});


Route::group(['middleware' => ['auth', 'role:kabid']], function () {

Route::get('/acckontraktor',[KontraktorController::class, 'acckontraktor'])->name('kontraktor.acckontraktor');
Route::get('/kontraktor/acc/{id}',[KontraktorController::class, 'acc'])->name('kontrakor.acc');
Route::get('/kontraktor/tolak/{id}',[KontraktorController::class, 'tolak'])->name('kontrakor.tolak');
Route::get('/projek/acc/{id}',[ProjekController::class, 'acc'])->name('projek.acc');
Route::get('/projek/tolak/{id}',[ProjekController::class, 'tolak'])->name('projek.tolak');
Route::get('/list-ahsp',[ProjekController::class, 'listahsp'])->name('kabid.listahsp');
Route::get('/persetujuan/show/{id}',[ProjekController::class, 'show'])->name('persetujuan.show');

});

Route::group(['middleware' => ['auth', 'role:admin,kotraktor,surveyor,kabid']], function () {
    Route::get('/cetak/{id}',[ProjekController::class, 'cetak'])->name('cetak');
    Route::get('/view-projek',[ProjekController::class, 'index'])->name('viewprojek');
    Route::get('/view-projek/show/{id}',[ProjekController::class, 'show'])->name('viewprojek.show');

});


