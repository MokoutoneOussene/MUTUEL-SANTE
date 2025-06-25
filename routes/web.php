<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\InscriptionController;


Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('authentification', [PageController::class, 'auth'])->name('authentification');
Route::get('inscription', [PageController::class, 'register'])->name('inscription');

Route::post('connexion', [AuthController::class, 'login'])->name('login');
Route::post('deconnexion', [AuthController::class, 'logout'])->name('logout');
