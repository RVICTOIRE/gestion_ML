<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le pointage') }}
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

        <!-- Formulaire de modification -->
        <form action="{{ route('Reporting.affichagePointage.update', $pointage) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="Date">Date</label>
                <input type="date" name="Date" value="{{ old('Date', $pointage->Date) }}" class="form-control" required>
            </div>

            <!-- Champs pour idML et idCommune -->
            <div class="form-group">
                <label for="idML">Matériel Lourd</label>
                <select name="idML" class="form-control" required>
                    <option value="">Sélectionnez un matériel</option>
                    @foreach($materielsLourds as $materiel)
                        <option value="{{ $materiel->idML }}" {{ $pointage->idML == $materiel->idML ? 'selected' : '' }}>
                            {{ $materiel->matricule }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="idCommune">Commune</label>
                <select name="idCommune" class="form-control" required>
                    <option value="">Sélectionnez une commune</option>
                    @foreach($communes as $commune)
                        <option value="{{ $commune->id }}" {{ $pointage->idCommune == $commune->id ? 'selected' : '' }}>
                            {{ $commune->nom_commune }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="Fonctionnel">Fonctionnel</label>
                <input type="hidden" name="Fonctionnel" value="0">
                <input 
                    type="checkbox" 
                    id="Fonctionnel" 
                    name="Fonctionnel" 
                    value="1" 
                    {{ old('Fonctionnel', $pointage->Fonctionnel ?? false) ? 'checked' : '' }}>
                
            </div>

            <div class="form-group">
                <label for="Rotation">Rotation</label>
                <input 
                    type="number" 
                    id="Rotation" 
                    name="Rotation" 
                    value="{{ old('Rotation', $pointage->Rotation ?? 0) }}" 
                    class="form-control" 
                    {{ old('Fonctionnel', $pointage->Fonctionnel ?? false) ? '' : 'disabled' }} 
                    required>
                   
                    
                    
                    
            </div>


            <!-- Ajout de JS pour aral -->
            <script>
   document.addEventListener('DOMContentLoaded', function () {
    const fonctionnelCheckbox = document.getElementById('Fonctionnel');
    const rotationInput = document.getElementById('Rotation');
    const form = rotationInput.closest('form'); // Trouve le formulaire parent

    // Activer Rotation avant l'envoi du formulaire
    form.addEventListener('submit', function () {
        if (rotationInput.hasAttribute('disabled')) {
            rotationInput.removeAttribute('disabled');
        }
    });

    // Gestion du changement d'état de Fonctionnel
    fonctionnelCheckbox.addEventListener('change', function () {
        if (fonctionnelCheckbox.checked) {
            rotationInput.removeAttribute('disabled');
        } else {
            rotationInput.setAttribute('disabled', 'true');
            rotationInput.value = 0; // Réinitialiser Rotation à 0 si non fonctionnel
        }
    });

    // Initialiser l'état de Rotation
    if (!fonctionnelCheckbox.checked) {
        rotationInput.setAttribute('disabled', 'true');
        rotationInput.value = 0;
    }
});
</script>

                    <!-- fin de aral -->
            
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('Reporting.affichagePointage') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>

    
</x-app-layout>
