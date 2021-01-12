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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('service', '\App\Http\Controllers\ServiceController')->middleware('auth');

/* Inicia rutas para perfil de usuario */
Route::get('profile/create', [App\Http\Controllers\ProfileController::class, 'create'])->name('profile.create')->middleware('auth');
Route::post('profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store')->middleware('auth');
Route::get('profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
/* == Finaliza rutas para perfil de usuario == */

/* Inicia rutas para sistema de comunicacion en perfil servicio */
Route::post('post', [App\Http\Controllers\PostController::class, 'store'])->name('post.store')->middleware('auth');
Route::post('comment', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store')->middleware('auth');
/* Fin de rutas para comunicacion en perfil servicio */

Route::get('profile/{profile}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show')->middleware('auth');

/*Inicia rutas para calificacion de servicio */
Route::put('rating/{rating}', [App\Http\Controllers\RatingController::class, 'update'])->name('rating.update')->middleware('auth');
Route::get('service/{prom}', [App\Http\Controllers\RatingController::class, 'average'])->name('toServiceController');

/* Inicia ruta para eliminar usuario */
Route::delete('user/delete', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('user.destroy')->middleware('auth');
/* == Finaliza ruta para eliminar usuario == */

/* Inicio ruta para manejar purchases */
Route::post('purchase/store', [App\Http\Controllers\PurchaseController::class, 'store'])->name('purchase.store')->middleware('auth');
/* == Finaliza rutas para manejar purchases == */
