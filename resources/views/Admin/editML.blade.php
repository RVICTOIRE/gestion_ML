<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
            {{ __('Modifier le type de véhicule') }}
        </h2>
    </x-slot>

    <!-- Affichage des erreurs et des messages de succès -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- zone d'enregistrement -->
    <div class="container mt-4">
        <h2></h2>

        <form action="{{ route('Admin.affichageML.update', $materiel_lourd->idML) }}" method="POST">
    @csrf
    @method('PUT') <!-- Utilisez PUT pour les mises à jour -->

    <div class="form-group">
        <label for="matricule">Matricule</label>
        <input type="text" name="matricule" class="form-control"
               value="{{ old('matricule', $materiel_lourd->matricule) }}" required>
    </div>

    <div class="form-group">
        <label for="typeml">Type de véhicule</label>
        <input type="text" name="typeml" class="form-control"
               value="{{ old('typeml', $materiel_lourd->typeml) }}" required>
    </div>

    <div class="form-group">
        <label for="capacite">Capacité</label>
        <input type="text" name="capacite" class="form-control"
               value="{{ old('capacite', $materiel_lourd->capacite) }}" required>
    </div>

    <div class="form-group">
        <label for="idConcess">Concessionnaire</label>
        <select name="idConcess" class="form-control" required>
            <option value="">Sélectionnez un concessionnaire</option>
            @foreach ($concessionaires as $concessionaire)
                <option value="{{ $concessionaire->idConcess }}"
                    {{ old('idConcess', $materiel_lourd->idConcess) == $concessionaire->idConcess ? 'selected' : '' }}>
                    {{ $concessionaire->nomConcess }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Mettre à jour</button>
    <a href="{{ route('Admin.affichageML') }}" class="btn btn-secondary">Annuler</a>
</form>

    
</x-app-layout>
