<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


/*
|--------------------------------------------------------------------------
| Autenticación
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/acceso', [
        AuthController::class,
        'showAccess'
    ])->name('access');

    Route::post('/registro', [
        AuthController::class,
        'register'
    ])->name('register');

    Route::post('/iniciar-sesion', [
        AuthController::class,
        'login'
    ])->name('login');
});


/*
|--------------------------------------------------------------------------
| Zona privada
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/publicaciones', [
        PublicationController::class,
        'index'
    ])->name('publications.index');

    Route::get('/publicaciones/nueva', [
        PublicationController::class,
        'create'
    ])->name('publications.create');

    Route::post('/publicaciones', [
        PublicationController::class,
        'store'
    ])->name('publications.store');

    Route::post('/publicaciones/{publication}/like', [
        PublicationController::class,
        'like'
    ])->name('publications.like');

    Route::post('/motivacion', [
        PublicationController::class,
        'updateMotivation'
    ])->name('motivation.update');

    Route::post('/cerrar-sesion', [
        AuthController::class,
        'logout'
    ])->name('logout');
});