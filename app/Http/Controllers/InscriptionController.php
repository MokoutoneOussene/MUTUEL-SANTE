<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InscriptionController extends Controller
{
    // Affiche le formulaire d'inscription
    public function showForm() {
        return view('pages.cotisant.inscription'); // resources/views/register.blade.php
    }

    // Traite l'inscription
    public function inscription(Request $request) {
        $request->validate([
            'nom'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'telephone' => 'nullable|string|max:20',
            'pays' => 'nullable|string|max:100',
            'societe' => 'nullable|string|max:100',
        ]);
    
        User::create([
            'nom'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
            'pays' => $request->pays,
            'societe' => $request->societe,
            'role' => 'utilisateur',
        ]);
    
        return redirect('/login')->with('success', 'Inscription réussie !');
    }

    public function updatecompte(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pays' => 'nullable|string|max:100',
            'ville' => 'nullable|string|max:100',
            'diplome' => 'nullable|string|max:100',
            'annee_diplome' => 'nullable|string|max:10',
        ]);

        $user->update($request->only([
            'nom', 'email', 'pays', 'ville', 'diplome', 'annee_diplome'
        ]));

        return back()->with('success', 'Profil mis à jour avec succès !');
}
}
