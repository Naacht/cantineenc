<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ReservationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/info', function() {
        return view('pages/info-etudiant');
    }) ->name('info') ;

    Route::get('/menu', function() {
        return view('pages/menu-cantine');
    }) ->name('menu') ;

    Route::get('/reservation', function() {
        return view('pages/reservation');
    }) ->name('reservation') ;

    Route::get('/paiement', function() {
        return view('pages/paiement');
    }) ->name('paiement') ;

    Route::get('/informations', function() {
        return view('pages/informations');
    }) ->name('informations') ;

    Route::get('/informations', 'InformationController@show')->name('informations');

    Route::get('/informations', [InformationController::class, 'show'])->name('informations');


    Route::post('/process-payment', [PaiementController::class, 'processPayment'])->name('process_payment');

    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation');
    Route::get('/annuler/{id}', [ReservationController::class, 'annuler'])->name('annuler');


});
