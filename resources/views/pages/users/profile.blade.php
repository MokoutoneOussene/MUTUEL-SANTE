@php
    $utilisateur = (object) [
        'id' => '1',
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
@endphp


@extends('layout.master')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm border border-success p-4">
        <h3 class="text-center text-success mb-4">Profil de l'utilisateur</h3>

        <!-- 👤 SECTION 1 : État Civil -->
        <div class="mb-4">
            <h5 class="text-success border-bottom pb-2 mb-3">👤 État Civil</h5>
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <img src="{{ asset('assets/img/avatar.png') }}" class="img-fluid rounded-circle shadow" width="150" alt="Avatar">
                    <h5 class="mt-3">{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</h5>
                    <span class="badge bg-success">{{ ucfirst($utilisateur->role ?? 'Utilisateur') }}</span>
                </div>
                <div class="col-md-8">
                    <div class="row mb-2">
                        <div class="col-md-6"><strong>Nom de jeune fille :</strong> {{ $utilisateur->nom_jeune_fille }}</div>
                        <div class="col-md-6"><strong>Situation matrimoniale :</strong> {{ $utilisateur->situation_matrimoniale }}</div>
                        <div class="col-md-6"><strong>Date de naissance :</strong> {{ \Carbon\Carbon::parse($utilisateur->date_naiss)->format('d/m/Y') }}</div>
                        <div class="col-md-6"><strong>Lieu de naissance :</strong> {{ $utilisateur->lieu_naiss }}</div>
                        <div class="col-md-6"><strong>Nationalité :</strong> {{ $utilisateur->nationalite }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 📞 SECTION 2 : Coordonnées -->
        <div class="mb-4">
            <h5 class="text-success border-bottom pb-2 mb-3">📞 Coordonnées</h5>
            <div class="row mb-2">
                <div class="col-md-6"><strong>Email :</strong> {{ $utilisateur->email }}</div>
                <div class="col-md-6"><strong>Téléphone :</strong> {{ $utilisateur->telephone }}</div>
                <div class="col-md-6"><strong>Adresse permanente :</strong> {{ $utilisateur->adresse }}</div>
                <div class="col-md-6"><strong>Domicile :</strong> {{ $utilisateur->domicile }}</div>
                <div class="col-md-6"><strong>N° Matricule :</strong> {{ $utilisateur->matricule }}</div>
                <div class="col-md-6"><strong>N° RCCM :</strong> {{ $utilisateur->num_rccm }}</div>
                <div class="col-md-6"><strong>Lieu d'exercice :</strong> {{ $utilisateur->lieu_exercice }}</div>
            </div>
        </div>

        <!-- 🎓 SECTION 3 : Diplômes -->
        <div class="mb-4">
            <h5 class="text-success border-bottom pb-2 mb-3">🎓 Diplômes</h5>
            <div class="row mb-2">
                <div class="col-md-6"><strong>Date d'obtention :</strong> {{ \Carbon\Carbon::parse($utilisateur->date_obtention)->format('d/m/Y') }}</div>
                <div class="col-md-6"><strong>Institution :</strong> {{ $utilisateur->intitution }}</div>
                <div class="col-md-6"><strong>Lieu de délivrance :</strong> {{ $utilisateur->lieu_delivrance }}</div>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('mes_cotisations') }}" class="btn btn-outline-success">💰 Mes cotisations</a>
            <a href="{{ route('profil.edit', $utilisateur->id) }}" class="btn btn-outline-success">✏️ Modifier</a>
        </div>

    </div>
</div>
@endsection
