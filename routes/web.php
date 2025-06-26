<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('authentification', [PageController::class, 'auth'])->name('authentification');
Route::get('inscription_nouveau_compte', [PageController::class, 'inscription'])->name('inscription');

Route::post('add_user', [AuthController::class, 'add_user'])->name('register');
Route::post('connexion', [AuthController::class, 'login'])->name('login'); 
Route::post('deconnexion', [AuthController::class, 'logout'])->name('logout');

