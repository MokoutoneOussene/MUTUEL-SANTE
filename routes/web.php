<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Illuminate\Http\Request;


Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('authentification', [PageController::class, 'auth'])->name('authentification');
Route::get('inscription_nouveau_compte', [PageController::class, 'inscription'])->name('inscription');
Route::get('list_users', [PageController::class, 'listeusers'])->name('list_users');
Route::get('compte', [PageController::class, 'compte'])->name('compte');
Route::get('cotisations', [PageController::class, 'cotisations'])->name('cotisations');
Route::get('mes-cotisations', [PageController::class, 'mescotisations'])->name('mes_cotisations');
Route::get('cotisation', [PageController::class, 'cotisation'])->name('cotisation');
Route::get('/profil/{id}/edit', [PageController::class, 'edit'])->name('profil.edit');
Route::put('/profil/{id}', [PageController::class, 'update'])->name('profil.update');


Route::post('add_user', [AuthController::class, 'add_user'])->name('register');
Route::post('connexion', [AuthController::class, 'login'])->name('login'); 
Route::post('deconnexion', [AuthController::class, 'logout'])->name('logout');
Route::put('compte', [InscriptionController::class, 'updatecompte'])->name('update.compte');
Route::put('cotisation', [InscriptionController::class, 'addcotisation'])->name('add.cotisation');

Route::post('/valider-inscription', function (Request $request) {
    $email = $request->input('email');
    
    // 👉 Ici tu fais ta logique métier : update user dans DB, envoi mail, etc.
    // Exemple : User::where('email', $email)->update(['validated' => true]);

    return response()->json(['message' => 'Utilisateur validé avec succès !']);
});

