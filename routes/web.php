<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.cusLogin');
});

//Login and Home
Auth::routes();
Route::get('/cusLogin', [App\Http\Controllers\Auth\CustomLoginController::class, 'loginForm'])->name('custom.login');
Route::post('/customlogin', [App\Http\Controllers\Auth\CustomLoginController::class, 'login'])->name('customlogin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin
Route::get('/profileadmin', [App\Http\Controllers\AdminController::class, 'index'])->name('profileadmin');
Route::get('/editprofadmin/{id}', [App\Http\Controllers\AdminController::class, 'editAdmin'])->name('formeditadmin');
Route::post('/editprofadmin/updateAdmin', [App\Http\Controllers\AdminController::class, 'updateAdmin'])->name('upprofiladmin');

//Karyawan
Route::get('datakar/export/',[App\Http\Controllers\KaryawanController::class, 'export'])->name('downloaddatakar');
Route::get('/datakar', [App\Http\Controllers\KaryawanController::class, 'indexKar'])->name('listdatakar');
Route::get('/addkaryawan', [App\Http\Controllers\KaryawanController::class, 'formAddKar'])->name('formaddkar');
Route::post('/addkaryawan/addKar', [App\Http\Controllers\KaryawanController::class, 'addKar'])->name('addDataKar');

//Penggajian
Route::get('/historygaji', [App\Http\Controllers\AdminController::class, 'historyGaji'])->name('historyGaji');

Route::get('/addgajikar/{id}', [App\Http\Controllers\AdminController::class, 'formGaji'])->name('formaddgajikar');
Route::post('/addgajikar/addGaji', [App\Http\Controllers\AdminController::class, 'addGaji'])->name('addgajikar');

Route::get('/editgajikar/{id}', [App\Http\Controllers\AdminController::class, 'formEditGaji'])->name('formeditgajikar');

Route::post('/editgajikar/editGaji', [App\Http\Controllers\AdminController::class, 'editGaji'])->name('editgajikar');

Route::get('historygaji/export/',[App\Http\Controllers\AdminController::class, 'export'])->name('downloaddatagaji');

Route::get('datagajikar/',[App\Http\Controllers\KaryawanController::class, 'dataGajikar'])->name('tabledatagajikar');

//Lokasi Kerja
Route::get('/lokkerja', [App\Http\Controllers\AdminController::class, 'lokKerja'])->name('lokkerja');

Route::get('/formlokasiker', [App\Http\Controllers\AdminController::class, 'formAddLK'])->name('formaddlokkerja');

Route::post('/formlokasiker/addLokKerja', [App\Http\Controllers\AdminController::class, 'addLokKerja'])->name('addLK');

Route::get('/editlokkerja/{id}', [App\Http\Controllers\AdminController::class, 'formEditLokKerja'])->name('formeditlokkerja');

Route::post('/editlokkerja/updateLokKerja', [App\Http\Controllers\AdminController::class, 'updateLokKerja'])->name('editlokkerja');

Route::get('lokkerja/deleteLokKerja/{id}', [App\Http\Controllers\AdminController::class, 'deleteLokKerja'])->name('delloker');

// Route::get('/lokkerja/delete/{id}','@delete');

//Jabatan
Route::get('/listjabatan', [App\Http\Controllers\AdminController::class, 'indexjabatan'])->name('listjabatan');

Route::post('/listjabatan/addjabatan', [App\Http\Controllers\AdminController::class, 'addJabatan'])->name('addjabat');

Route::post('/listjabatan/updatejabatan', [App\Http\Controllers\AdminController::class, 'updateJabatan'])->name('upjabatan');

//Kontrak Kerja
Route::get('/formkontrakkerja/{id}', [App\Http\Controllers\AdminController::class, 'kontrakKerja'])->name('formaddkontrakkerja');

Route::post('/formkontrakkerja/addKontrakKerja', [App\Http\Controllers\AdminController::class, 'addKontrakKerja'])->name('addkonker');

//Paklarin
Route::get('/formpaklarin/{id}', [App\Http\Controllers\AdminController::class, 'paklarin'])->name('formpaklarin');

Route::post('/formpaklarin/addDataPak', [App\Http\Controllers\AdminController::class, 'addDataPak'])->name('adddatapak');

Route::get('/pdfPaklarin/{id}', [App\Http\Controllers\AdminController::class, 'pdfPaklarin'])->name('downloadpak');


//Absensi
Route::get('/dataabsenkar', [App\Http\Controllers\KaryawanController::class, 'dataAbsenKar'])->name('dataabsenkar');

Route::get('/dataabsenkars', [App\Http\Controllers\KaryawanController::class, 'lihatAbsen'])->name('dataabsenkars');

Route::post('/dataabsenkar/addMasuk', [App\Http\Controllers\KaryawanController::class, 'addMasuk'])->name('absenmasuk');

Route::post('/dataabsenkar/addPulang', [App\Http\Controllers\KaryawanController::class, 'addPulang'])->name('absenpulang');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
