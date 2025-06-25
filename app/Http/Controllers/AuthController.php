<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle the user login request.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Valider les données reçues
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Tenter l'authentification
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate(); // protège contre les attaques de session fixation

            return redirect()->intended('dashboard')->with('success', 'Connexion réussie');
        }

        // Échec : on retourne avec un message sans révéler la cause exacte
        return back()->withErrors([
            'email' => 'Les identifiants sont invalides.',
        ])->onlyInput('email');
    }

    /**
     * Handle the user logout request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken(); // Protection CSRF

        return redirect('home')->with('success', 'Déconnexion réussie.');
    }

    /**
     * Handle the user registration request.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add_user(Request $request)
    {
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->nom_jeune_fille = $request->nom_jeune_fille;
        $user->matricule = $request->matricule;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->date_naiss = $request->date_naiss;
        $user->lieu_naiss = $request->lieu_naiss;
        $user->nationalite = $request->nationalite;

        $user->situation_matrimoniale = $request->situation_matrimoniale;
        $user->adresse = $request->adresse;
        $user->domicile = $request->domicile;
        $user->num_rccm = $request->num_rccm;
        $user->lieu_exercice = $request->lieu_exercice;
        $user->statut = $request->statut;

        $user->region_ordinal_id = $request->region_ordinal_id;
        $user->region_id = $request->region_id;
        $user->ville_id = $request->ville_id;

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('pieces_jointes', 'public');
            $user['file'] = $path;
        }

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile', 'public');
            $user['photo'] = $path;
        }

        $user->save();

        return redirect()->back()->with('success', 'Inscription réussie. Vous recevez un email de confirmation.');
    }
}
