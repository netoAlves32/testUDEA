<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::view('/', 'welcome')->name('home');
Route::view('/contacto', 'contacto')->name('contacto');

Route::resource('stock', ProductController::class, [
    'names' => 'products',
    'parameters' => ['stock' => 'product']
]);

Route::patch('/stock/{product}', [ProductController::class, 'update'] )->name('products.update');

Route::get('/staff', [RegisteredUserController::class, 'index'])->name('users.index');;
Route::get('/staff/{user}', [RegisteredUserController::class, 'show'] )->name('users.show');
Route::get('/staff/{user}/edit', [RegisteredUserController::class, 'edit'] )->name('users.edit');
Route::patch('/staff/{user}', [RegisteredUserController::class, 'update'] )->name('users.update');
Route::delete('/staff/{user}', [RegisteredUserController::class, 'destroy'] )->name('users.destroy');


Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthenticatedSessionController::class,'login'])->name('user.logged');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthenticatedSessionController::class, 'register'])->name('user.store');

Route::post('/logout', [AuthenticatedSessionController::class,'logout'])->name('logout');




