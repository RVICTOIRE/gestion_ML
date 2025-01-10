<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
            {{ __('Liste des pointages effectués') }}
            
        </h2>
        <a href="{{ route('Delegue.index') }}" class="btn btn-outline-primary btn-sm">Accueil</a>
    </x-slot>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-4">
        <!-- Formulaire de recherche -->
        <form action="{{ route('Delegue.affichagePointageD') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="date_debut" class="form-label">Date de début :</label>
                    <input type="date" name="date_debut" id="date_debut" class="form-control" value="{{ request('date_debut') }}">
                </div>
                <div class="col-md-4">
                    <label for="date_fin" class="form-label">Date de fin :</label>
                    <input type="date" name="date_fin" id="date_fin" class="form-control" value="{{ request('date_fin') }}">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-success w-100">Rechercher</button>
                </div>
            </div>
        </form>

        <!-- Tableau des pointages -->
        <form action="" method="post">
        @csrf
            <table class="table table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Matériel Lourd</th>
                        <th scope="col">Matricule</th>
                        <th scope="col">Concessionnaires</th>
                        <th scope="col">Localisation</th>
                        <th scope="col">Fonctionnel</th>
                        <th scope="col">Rotation</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pointages as $pointage)
                        <tr>
                            <td>{{ $pointage->Date }}</td>
                            <td>{{ $pointage->materielLourd->typeml ?? 'N/A' }}</td>
                            <td>{{ $pointage->materielLourd->matricule ?? 'N/A' }}</td>
                            <td>{{ $pointage->materielLourd->Concessionnaire->nomConcess ?? 'N/A' }}</td>
                            <td>{{ $pointage->communeOuAxe->nom_commune ?? 'N/A' }}</td>
                            <td>{{ $pointage->Fonctionnel ? 'Oui' : 'Non' }}</td>
                            <td>{{ $pointage->Rotation }}</td>
                            <td>
                                
                            </td>
                            
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Aucun pointage trouvé pour les dates spécifiées.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </form>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $pointages->links() }}
        </div>
    </div>
</x-app-layout>
