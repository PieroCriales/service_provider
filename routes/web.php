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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
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
Route::get('purchase/{purchase}/edit', [App\Http\Controllers\PurchaseController::class, 'edit'])->name('purchase.edit')->middleware('auth');
Route::get('purchase/{purchase}', [App\Http\Controllers\PurchaseController::class, 'show'])->name('purchase.show')->middleware('auth');
Route::put('purchase/{purchase}', [App\Http\Controllers\PurchaseController::class, 'update'])->name('purchase.update')->middleware('auth');
/* == Finaliza rutas para manejar purchases == */

/* Inicio ruta de proceso de pago */
Route::post('/paypal', [App\Http\Controllers\PaymentController::class, 'payWithpaypal'])->name('paypal')->middleware('auth');

/* Ruta de estado de pago */
Route::get('/status/{purchase}', [App\Http\Controllers\PaymentController::class, 'getPaymentStatus'])->name('status')->middleware('auth');


/* Ruta para preguntas frecuentes */
Route::get('/faqs', [App\Http\Controllers\FaqsController::class,'show'])->name('faqs.show')->middleware('auth');

/* Inicia rutas para manejar likes */
Route::post('like/store', [App\Http\Controllers\LikeController::class, 'store'])->name('like.store')->middleware('auth');
Route::delete('like/{like}/delete', [App\Http\Controllers\LikeController::class, 'destroy'])->name('like.destroy')->middleware('auth');
/* == Finaliza ruta para manejar likes == */
/* Ruta de estado de chat */
Route::get('/purchase/mensajeria/{code}/', [App\Http\Controllers\ChatController::class, 'index'])->name('chat');

/* Rutas solo admin */
Route::get('/users/all', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/users/{user}/menu', [App\Http\Controllers\UserController::class, 'menu'])->name('user.menu');
Route::delete('/users/{user}/delete', [App\Http\Controllers\UserController::class, 'remove'])->name('user.delete');
Route::put('/users/{user}/change', [App\Http\Controllers\UserController::class, 'change'])->name('user.change');
Route::get('/purchases/all', [App\Http\Controllers\PurchaseController::class, 'index'])->name('purchase.index')->middleware('auth')->middleware('onlyadmin');
Route::get('/services/getall', [App\Http\Controllers\ServiceController::class, 'getall'])->name('service.getall')->middleware('auth')->middleware('onlyadmin');
Route::get('/purchases/general', [App\Http\Controllers\PurchaseController::class, 'general'])->name('purchase.general')->middleware('auth')->middleware('onlyadmin');
