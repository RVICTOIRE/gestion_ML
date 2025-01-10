<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Modifier la commune') }}
            
        </h2>
        <a href="{{ route('Admin.index') }}" class="btn btn-outline-primary btn-sm">Accueil</a>
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
            <!-- Méthode simulée pour une mise à jour -->
            <input type="hidden" name="_method" value="PUT">

            <!-- Champ Région -->
            <div class="form-group">
                <label for="region">Région</label>
                <select name="region" id="region" class="form-control" onchange="updateDepartements()" required>
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
                <select name="departement" id="departement" class="form-control" required>
                    <option value="">Sélectionnez un département</option>
                </select>
            </div>

            <!-- Champ Commune ou Axe -->
            <div class="form-group">
                <label for="nom_commune">Commune ou Axe</label>
                <input type="text" name="nom_commune" id="nom_commune" class="form-control" value="{{ $communeouaxe->nom_commune }}" required>
            </div>

            <!-- Boutons -->
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <!--<a href="{{ route('Admin.affichagecommune') }}" class="btn btn-secondary">Annuler</a>-->
        </form>
    </div>

    <!-- Script pour la mise à jour des départements -->
    <script>
        const regionsDepartements = {
            "Dakar": ["Dakar", "Guédiawaye", "Pikine", "Rufisque"],
            "Thies": ["Thiès", "Mbour", "Tivaouane"],
            "Louga": ["Louga", "Kébémer", "Linguère"],
            "Kaolack": ["Kaolack", "Nioro du Rip", "Guinguinéo"],
            "Kaffrine": ["Kaffrine", "Malem Hodar", "Koungheul", "Birkelane"],
            "Fatick": ["Fatick", "Foundiougne", "Gossas"],
            "Saint-Louis": ["Saint-Louis", "Dagana", "Podor"],
            "Matam": ["Matam", "Kanel", "Ranérou"],
            "Kédougou": ["Kédougou", "Salémata", "Saraya"],
            "Sédhiou": ["Sédhiou", "Bounkiling", "Goudomp"],
            "Kolda": ["Kolda", "Vélingara", "Médina Yoro Foulah"],
            "Diourbel": ["Diourbel", "Bambey", "Mbacké"],
            "Ziguinchor": ["Ziguinchor", "Bignona", "Oussouye"]
        };

        function updateDepartements() {
            const region = document.getElementById('region').value;
            const departementSelect = document.getElementById('departement');
            departementSelect.innerHTML = '<option value="">Sélectionnez un département</option>';
            
            if (regionsDepartements[region]) {
                regionsDepartements[region].forEach(departement => {
                    const option = document.createElement('option');
                    option.value = departement;
                    option.textContent = departement;
                    option.selected = departement === "{{ $communeouaxe->departement }}";
                    departementSelect.appendChild(option);
                });
            }
        }

        // Charger les départements lors de l'édition si une région est déjà sélectionnée
        document.addEventListener('DOMContentLoaded', updateDepartements);
    </script>
</x-app-layout>
