<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
            {{ __('Modifier le concessionaire') }}
            
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
        <h2></h2>

        <!-- Formulaire de modification -->
        <form action="{{ route('Admin.affichageConcess.update', $concessionaire) }}" method="POST">
            @csrf
            @method('PUT') <!-- Utilisez PUT pour les mises à jour -->

            <div class="form-group">
                <label for="nomConcess">Nom du concessionnaire</label>
                <input type="text" id="nomConcess" name="nomConcess" class="form-control"
                    value="{{ old('nomConcess', $concessionaire->nomConcess) }}" required>
            </div>

           

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <!--<a href="{{ route('Admin.affichageConcess') }}" class="btn btn-secondary">Annuler</a>-->
        </form>
    </div>

    
</x-app-layout>
