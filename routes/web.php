<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;


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
    return view('Auth/login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/login', [AuthController::class, 'index']);
Route::post('actionlogin', [AuthController::class, 'actionlogin'])->name('actionlogin');
Route::get('logout', 'LoginController@logout')->name('logout');

Route::get('kategori', [KategoriController::class, 'index'])->name('kategori');
Route::post('kategori/store', [KategoriController::class, 'store'])->name('kategori.store');

// Route::resource('kategori', KategoriController::class);




