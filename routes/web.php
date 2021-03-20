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

/* Inicia ruta para eliminar usuario */
Route::delete('user/delete', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('user.destroy')->middleware('auth');
/* == Finaliza ruta para eliminar usuario == */

/* Apostar */
Route::get('/room_user/store/{room}', [App\Http\Controllers\RoomUserController::class, 'create'])->name('room_user.create')->middleware('auth');
Route::post('/room_user', [App\Http\Controllers\RoomUserController::class, 'store'])->name('room_user.store')->middleware('auth');

/* Realizacion del juego */
Route::get('/game/{room}', [App\Http\Controllers\HistoryBetController::class, 'game'])->name('game.create')->middleware('auth');
Route::post('/game', [App\Http\Controllers\HistoryBetController::class, 'store'])->name('game.store')->middleware('auth');
