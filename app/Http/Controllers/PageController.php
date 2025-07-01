<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PageController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.index');
    }

    /**
     * Display the authentication page.
     *
     * @return \Illuminate\View\View
     */
    public function auth()
    {
        return view('pages.auth.connexion');
    }

    /**
     * Display the registration page.
     *
     * @return \Illuminate\View\View
     */
    public function inscription()
    {
        return view('pages.auth.inscription');
    }

    public function listeusers()
    {
        return view('pages.users.list_users');
    }

    public function compte()
    {
        $utilisateur = auth()->user(); // ou Utilisateur::find($id);
        return view('pages.users.profile', compact('utilisateur'));
    }

    public function showProfil()
    {
        $utilisateur = auth()->user(); // ou Utilisateur::find($id);
        return view('pages.users.profile', compact('utilisateur'));
    }

    public function edit($id)
    {
        //$utilisateur = User::findOrFail($id);

        // utilisateur simulé
    $utilisateur = (object)[
        'id' => $id,
        'nom' => 'Kaboré',
        'prenom' => 'Alice',
        'nom_jeune_fille' => 'Zongo',
        'situation_matrimoniale' => 'Marié',
        'date_naiss' => '1990-05-12',
        'lieu_naiss' => 'Ouagadougou',
        'nationalite' => 'Burkinabè',
        'email' => 'alice.kabore@example.com',
        'telephone' => '+226 70 00 00 01',
        'adresse' => 'Secteur 12, Ouagadougou',
        'domicile' => 'Zone du bois, Ouagadougou',
        'matricule' => 'EMP2023001',
        'num_rccm' => 'BF-OUA-2023-RCCM12345',
        'lieu_exercice' => 'CHU Yalgado, Ouagadougou',
        'intitution' => 'Université Joseph KI-ZERBO',
        'date_obtention' => '2015-07-30',
        'lieu_delivrance' => 'Ouagadougou',
        'role' => 'admin'
    ];
        return view('pages.users.profil-edit', compact('utilisateur'));
    }


    public function cotisations()
    {
        
        return view('pages.cotisation.list');
    }

    public function cotisation()
    {
        return view('pages.cotisation.add');
    }

    public function mescotisations()
    {
        return view('pages.cotisation.mes-cotisations');
    }

    
}
