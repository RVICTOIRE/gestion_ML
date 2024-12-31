<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Modifier la commune') }}
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

    <!-- Formulaire de modification -->
    <div class="container mt-4">
        <form action="{{ route('Admin.affichagecommune.update', $communeouaxe->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Utilisez PUT pour les mises à jour -->

            <!-- Champ Région -->
            <div class="form-group">
    <label for="region">Région</label>
    <select name="region" class="form-control" required>
        <option value="" disabled {{ old('region', $communeouaxe->region) == '' ? 'selected' : '' }}>
            Sélectionnez une région
        </option>
        @foreach(['Dakar', 'Thies', 'Louga', 'Kaolack', 'Kaffrine', 'Fatick', 'Saint-Louis', 'Matam', 'Kédougou', 'Sédhiou', 'Kolda', 'Diourbel', 'Ziguinchor'] as $region)
            <option value="{{ $region }}" {{ old('region', $communeouaxe->region) == $region ? 'selected' : '' }}>
                {{ $region }}
            </option>
        @endforeach
    </select>
</div>


            <!-- Champ Département -->
            <div class="form-group">
                <label for="departement">Département</label>
                <input type="text" name="departement" id="departement" class="form-control" value="{{ $communeouaxe->departement }}" required>
            </div>

            <!-- Champ Commune ou Axe -->
            <div class="form-group">
                <label for="nom_commune">Commune ou Axe</label>
                <input type="text" name="nom_commune" id="nom_commune" class="form-control" value="{{ $communeouaxe->nom_commune }}" required>
            </div>

            <!-- Boutons -->
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('Admin.affichagecommune') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</x-app-layout>
