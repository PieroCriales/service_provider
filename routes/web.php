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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Inicia rutas para perfil de usuario */
Route::get('profile/create', [App\Http\Controllers\ProfileController::class, 'create'])->name('profile.create')->middleware('auth');
Route::post('profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store')->middleware('auth');
Route::get('profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
