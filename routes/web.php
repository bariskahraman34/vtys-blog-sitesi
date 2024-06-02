<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\YorumController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog/{id}', [HomeController::class, 'blogView']);
Route::get('/profil', [HomeController::class, 'profile']);
Route::put('/profil', [HomeController::class, 'profileUpdate']);

Route::get('/blog-ekle', [BlogController::class, 'create']);
Route::post('/blog-ekle', [BlogController::class, 'store']);
Route::get('/blog-guncelle/{id}', [BlogController::class, 'edit']);
Route::put('/blog-guncelle/{id}', [BlogController::class, 'update']);
Route::delete('/blog-sil/{id}', [BlogController::class, 'destroy']);

Route::get('/kategoriler', [KategoriController::class, 'index']);
Route::post('/kategori-ekle', [KategoriController::class, 'store']);
Route::put('/kategori-guncelle/{id}', [KategoriController::class, 'update']);
Route::delete('/kategori-sil/{id}', [KategoriController::class, 'destroy']);

Route::post('/yorum-ekle', [YorumController::class, 'store']);
Route::delete('/yorum-sil/{id}', [YorumController::class, 'destroy']);
