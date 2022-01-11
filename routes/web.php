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

Auth::routes();
Route::get('/cusLogin', [App\Http\Controllers\Auth\CustomLoginController::class, 'loginForm'])->name('custom.login');
Route::post('/customlogin', [App\Http\Controllers\Auth\CustomLoginController::class, 'login'])->name('customlogin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin
Route::get('/profileadmin', [App\Http\Controllers\AdminController::class, 'index'])->name('profileadmin');
Route::get('/editprofadmin/{id}', [App\Http\Controllers\AdminController::class, 'editAdmin'])->name('formeditadmin');

//Karyawan
Route::get('/addkaryawan', [App\Http\Controllers\KaryawanController::class, 'formAddKar'])->name('home');
