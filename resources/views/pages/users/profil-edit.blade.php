@extends('layout.master')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm border border-success p-4">
        <h3 class="text-center text-success mb-4">✏️ Modifier mon profil</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('profil.update', $utilisateur->id) }}">
            @csrf
            @method('PUT')

            <!-- 👤 État civil -->
            <h5 class="text-success border-bottom pb-2 mb-3">👤 État Civil</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Nom</label>
                    <input type="text" name="nom" value="{{ old('nom', $utilisateur->nom) }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Nom de jeune fille</label>
                    <input type="text" name="nom_jeune_fille" value="{{ old('nom_jeune_fille', $utilisateur->nom_jeune_fille) }}" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Prénom(s)</label>
                    <input type="text" name="prenom" value="{{ old('prenom', $utilisateur->prenom) }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Date de naissance</label>
                    <input type="date" name="date_naiss" value="{{ old('date_naiss', $utilisateur->date_naiss) }}" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Lieu de naissance</label>
                    <input type="text" name="lieu_naiss" value="{{ old('lieu_naiss', $utilisateur->lieu_naiss) }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Nationalité</label>
                    <input type="text" name="nationalite" value="{{ old('nationalite', $utilisateur->nationalite) }}" class="form-control" required>
                </div>
            </div>
            <div class="mb-4">
                <label>Situation matrimoniale</label>
                <select name="situation_matrimoniale" class="form-select" required>
                    <option value="Marié" {{ old('situation_matrimoniale', $utilisateur->situation_matrimoniale) == 'Marié' ? 'selected' : '' }}>Marié</option>
                    <option value="Célibataire" {{ old('situation_matrimoniale', $utilisateur->situation_matrimoniale) == 'Célibataire' ? 'selected' : '' }}>Célibataire</option>
                    <option value="Divorcé(e)" {{ old('situation_matrimoniale', $utilisateur->situation_matrimoniale) == 'Divorcé(e)' ? 'selected' : '' }}>Divorcé(e)</option>
                    <option value="Veuf(ve)" {{ old('situation_matrimoniale', $utilisateur->situation_matrimoniale) == 'Veuf(ve)' ? 'selected' : '' }}>Veuf(ve)</option>
                </select>
            </div>

            <!-- 📞 Contact -->
            <h5 class="text-success border-bottom pb-2 mb-3">📞 Coordonnées</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email', $utilisateur->email) }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label>Téléphone</label>
                    <input type="text" name="telephone" value="{{ old('telephone', $utilisateur->telephone) }}" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Adresse</label>
                    <input type="text" name="adresse" value="{{ old('adresse', $utilisateur->adresse) }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Domicile</label>
                    <input type="text" name="domicile" value="{{ old('domicile', $utilisateur->domicile) }}" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Matricule</label>
                    <input type="text" name="matricule" value="{{ old('matricule', $utilisateur->matricule) }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>RCCM</label>
                    <input type="text" name="num_rccm" value="{{ old('num_rccm', $utilisateur->num_rccm) }}" class="form-control">
                </div>
            </div>
            <div class="mb-4">
                <label>Lieu d'exercice</label>
                <input type="text" name="lieu_exercice" value="{{ old('lieu_exercice', $utilisateur->lieu_exercice) }}" class="form-control">
            </div>

            <!-- 🎓 Diplômes -->
            <h5 class="text-success border-bottom pb-2 mb-3">🎓 Diplômes</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Date d'obtention</label>
                    <input type="date" name="date_obtention" value="{{ old('date_obtention', $utilisateur->date_obtention) }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Institution</label>
                    <input type="text" name="intitution" value="{{ old('intitution', $utilisateur->intitution) }}" class="form-control">
                </div>
            </div>
            <div class="mb-4">
                <label>Lieu de délivrance</label>
                <input type="text" name="lieu_delivrance" value="{{ old('lieu_delivrance', $utilisateur->lieu_delivrance) }}" class="form-control">
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success"> Enregistrer les modifications</button>
            </div>
        </form>
    </div>
</div>
@endsection
