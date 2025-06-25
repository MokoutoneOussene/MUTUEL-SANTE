@extends('layout.master')

@section('content')
<h2 class="mb-4 text-center">Créer un compte</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('inscription.perform') }}">
    @csrf

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Nom complet</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Adresse email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Téléphone</label>
            <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Pays</label>
            <input type="text" name="pays" class="form-control" value="{{ old('pays') }}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Société</label>
            <input type="text" name="societe" class="form-control" value="{{ old('societe') }}">
        </div>
        <div class="col-md-6">
            <label class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" required>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <label class="form-label">Confirmation du mot de passe</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <div class="col-md-6 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
        </div>
    </div>
</form>
@endsection
