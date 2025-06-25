<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\InscriptionController;


Route::get('/', [PageController::class, 'index'])->name('home');
// routes/web.php
Route::get('/inscription', [InscriptionController::class, 'showForm'])->name('inscription.form');    // Affiche le formulaire
Route::post('/inscription', [InscriptionController::class, 'inscription'])->name('inscription.perform'); // Traite les données

