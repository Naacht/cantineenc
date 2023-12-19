<?php

use Illuminate\Support\Facades\Route;

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
});
