<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center" >
                {{ __('Liste des pointages effectués') }}
            </h2>
            <a href="{{ route('Reporting.index') }}" class="btn btn-outline-primary btn-sm">Accueil</a>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-4">
        <!-- Formulaire de recherche -->
        <form action="" method="post" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="date_debut" class="form-label">Date de début :</label>
                    <input type="date" name="date_debut" id="date_debut" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="date_fin" class="form-label">Date de fin :</label>
                    <input type="date" name="date_fin" id="date_fin" class="form-control">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" name="rechercher" class="btn btn-success w-100">Rechercher</button>
                </div>
            </div>
        </form>

        <!-- Tableau des pointages -->
        <form action="" method="post">
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
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pointages as $pointage)
                        <tr>
                            <td>{{ $pointage->Date }}</td>
                            <td>{{ $pointage->materielLourd->typeml ?? 'N/A' }}</td>
                            <td>{{ $pointage->materielLourd->matricule ?? 'N/A' }}</td>
                            <td>{{ $pointage->materielLourd->Concessionnaire->nomConcess ?? 'N/A' }}</td>
                            <td>{{ $pointage->communeOuAxe->nom_commune ?? 'N/A' }}</td>
                            <td>{{ $pointage->Fonctionnel ? 'Oui' : 'Non' }}</td>
                            <td>{{ $pointage->Rotation }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <!-- Bouton Modifier -->
                                    <a href="{{ route('Reporting.affichagePointage.edit', $pointage->idPointage) }}" class="btn btn-primary btn-sm">
                                        Modifier
                                    </a>
                                    <!-- Formulaire pour le bouton Supprimer -->
                                    <form action="{{ route('Reporting.affichagePointage.destroy', $pointage->idPointage) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet enregistrement ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $pointages->links() }}
        </div>
    </div>
</x-app-layout>
