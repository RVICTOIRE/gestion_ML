<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
            {{ __('Enregistrement des communes ou axes') }}
            
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

    <!-- zone d'enregistrement -->
    <div class="container mt-4">
        <div id="container">
            <!-- Formulaire d'enregistrement -->
            <form action="{{ route('Admin.storeCommuneForm') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="region">Région</label>
                    <select name="region" id="region" class="form-control" onchange="updateDepartements()">
                        <option value="">Sélectionnez une région</option>
                        <option value="Dakar">Dakar</option>
                        <option value="Thies">Thies</option>
                        <option value="Louga">Louga</option>
                        <option value="Kaolack">Kaolack</option>
                        <option value="Kaffrine">Kaffrine</option>
                        <option value="Fatick">Fatick</option>
                        <option value="Saint-Louis">Saint-Louis</option>
                        <option value="Matam">Matam</option>
                        <option value="Kédougou">Kédougou</option>
                        <option value="Sédhiou">Sédhiou</option>
                        <option value="Kolda">Kolda</option>
                        <option value="Diourbel">Diourbel</option>
                        <option value="Ziguinchor">Ziguinchor</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="departement">Départements</label>
                    <select name="departement" id="departement" class="form-control">
                        <option value="">Sélectionnez un département</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nom_commune">Communes ou Axe</label>
                    <input type="text" name="nom_commune" id="nom_commune" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-success">Enregistrer</button>
                <!--<button type="button" class="btn btn-info"><a href="/Admin">Retour</a></button>-->
            </form>
        </div>
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
                    departementSelect.appendChild(option);
                });
            }
        }
    </script>
</x-app-layout>
