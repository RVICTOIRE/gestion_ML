<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
            {{ __('Enregistrement du pointage') }}
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
        <div id="container">
            <!-- Formulaire d'enregistrement -->
            <form action="{{ route('Reporting.storePointageForm') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="Date">Date</label>
                    <input type="date" name="Date" id="Date" class="form-control">
                </div>

                <div class="form-group">
                    <label for="idML">Matricule</label>
                    <select name="idML" class="form-control">   --
                        <Option></Option>
                        @foreach($Materiel_lourd as $materiel_lourd)
                            <option value="{{ $materiel_lourd->idML }}">{{ $materiel_lourd->matricule }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="idCommune">Localisation</label>
                    <select name="idCommune" class="form-control">
                    <option value=""></option>
                        @foreach($communeOuAxe as $communeOu_Axe)
                            <option value="{{ $communeOu_Axe->id }}">{{ $communeOu_Axe->nom_commune }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                        <label for="Fonctionnel">Fonctionnel</label>
                        <input 
                            type="checkbox" 
                            id="Fonctionnel" 
                            name="Fonctionnel" 
                            value="1" 
                            {{ old('Fonctionnel') ? 'checked' : '' }}>
                        <!-- Champ caché pour gérer le cas où la case est décochée -->
                        <input type="hidden" name="Fonctionnel_hidden" value="0">
                    </div>

                    <div class="form-group">
                        <label for="Rotation">Rotation</label>
                        <input 
                            type="number" 
                            id="Rotation" 
                            name="Rotation" 
                            value="{{ old('Rotation', 0) }}" 
                            class="form-control" 
                            {{ old('Fonctionnel') ? '' : 'disabled' }} 
                            required>
                </div>





                <!-- Ajout de JS pour aral -->
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const fonctionnelCheckbox = document.getElementById('Fonctionnel');
                        const rotationInput = document.getElementById('Rotation');

                        // Fonction pour activer/désactiver Rotation
                        const toggleRotationState = () => {
                            if (fonctionnelCheckbox.checked) {
                                rotationInput.removeAttribute('disabled');
                            } else {
                                rotationInput.setAttribute('disabled', 'true');
                                rotationInput.value = 0; // Réinitialise Rotation à 0 si non fonctionnel
                            }
                        };

                        // Initialisation à l'affichage de la page
                        toggleRotationState();

                        // Événement de changement sur Fonctionnel
                        fonctionnelCheckbox.addEventListener('change', toggleRotationState);
                    });
                </script>

                    <!-- fin de aral -->

                <button type="submit" name="submit" class="btn btn-success">Enregistrer</button>
                <a href="/Reporting" class="btn btn-info">Retour</a>
            </form>
        </div>
    </div>
</x-app-layout>
