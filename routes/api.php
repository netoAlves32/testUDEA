<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthenticatedSessionController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(ProductController::class)->group(function () {
    Route::get('/stock', 'index');
    Route::post('/stock','store');
    Route::get('/stock/{product}', 'show');
    Route::put('/stock/{product}', 'update');
    Route::delete('/stock/{product}','destroy');
});

Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('/staff','index');
    Route::get('/staff/{user}','show');
    Route::get('/staff/{user}/edit','edit');
    Route::patch('/staff/{user}','update');
    Route::delete('/staff/{user}','destroy');
});

