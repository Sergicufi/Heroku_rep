<?php

use Illuminate\Support\Facades\Route;

// Controlador Stripe
use App\Http\Controllers\StripePaymentController;

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

Auth::routes();

// Route::get('/Ruta', [App\Http\Controllers\NomControllador::class, 'NomFuncióCreada'])->name('NomFitxer.blade.php creat a views');
Route::get('/', [App\Http\Controllers\redirectController::class, 'index'])->name('index');
Route::get('/index', [App\Http\Controllers\redirectController::class, 'index'])->name('index');
Route::get('/aboutUs', [App\Http\Controllers\redirectController::class, 'aboutUs'])->name('aboutUs');
Route::get('/search', [App\Http\Controllers\redirectController::class, 'search'])->name('search');
Route::get('/vistaAllotjament', [App\Http\Controllers\redirectController::class, 'vistaAllotjament'])->name('vistaAllotjament');
Route::get('/Allotjaments', [App\Http\Controllers\redirectController::class, 'allotjaments'])->name('allotjaments')->middleware('auth');
Route::get('/newAccommodation', [App\Http\Controllers\redirectController::class, 'newAccommodation'])->name('newAccommodation')->middleware('auth');
Route::get('/completarReserva', [App\Http\Controllers\redirectController::class, 'completarReserva'])->name('completarReserva')->middleware('auth');
Route::get('stripe', [StripePaymentController::class, 'stripe']);
Route::get('/Favorits', [App\Http\Controllers\redirectController::class, 'favorits'])->name('favorits')->middleware('auth');
Route::get('/editAccommodation', [App\Http\Controllers\redirectController::class, 'editAccommodation'])->name('editAccommodation')->middleware('auth');
Route::get('/removeAccommodation', [App\Http\Controllers\redirectController::class, 'removeAccommodation'])->name('removeAccommodation')->middleware('auth');

Route::get('/searchBar', [App\Http\Controllers\axiosServer::class, 'searchBar'])->name('AxiosProva');
Route::get('/checkFav', [App\Http\Controllers\axiosServer::class, 'checkFav'])->name('checkFav');
Route::get('/checkFav2', [App\Http\Controllers\axiosServer::class, 'checkFav2'])->name('checkFav2');
Route::get('/checkFav3', [App\Http\Controllers\axiosServer::class, 'checkFav3'])->name('checkFav3');
Route::get('/Reserva', [App\Http\Controllers\redirectController::class, 'reserva'])->name('reserva')->middleware('auth');
Route::get('/searchBar2', [App\Http\Controllers\axiosServer::class, 'searchBar2'])->name('searchBar2');

Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

Route::post('/newAccommodation-validationForm', [App\Http\Controllers\ValidationFormController::class, 'newAccommodation'])->name('newAccommodation');
Route::post('/editAccommodation-validationForm', [App\Http\Controllers\ValidationFormController::class, 'editAccommodation'])->name('editAccommodation');
