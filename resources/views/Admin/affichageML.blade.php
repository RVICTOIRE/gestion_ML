<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                {{ __('Liste du matériel lourd de la SONAGED') }}
            </h2>
            <a href="{{ route('Admin.index') }}" class="btn btn-outline-primary btn-sm">Accueil</a>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-4">
        <form action="" method="post">
            <table class="table table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Matricule</th>
                        <th scope="col">Type de véhicules</th>
                        <th scope="col">Capacité</th>
                        <th scope="col">Concessionnaire</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
    @foreach ($materiel_lourds as $materiel_lourd)
        <tr>
            <td>{{ $materiel_lourd->matricule }}</td>
            <td>{{ $materiel_lourd->typeml }}</td>
            <td>{{ $materiel_lourd->capacite }}</td>
            <td>{{ $materiel_lourd->Concessionnaire->nomConcess ?? 'Non assigné' }}</td>
            <td>
                <div class="d-flex gap-2">
                    <a href="{{ route('Admin.affichageML.edit', $materiel_lourd->idML) }}" class="btn btn-primary btn-sm">Modifier</a>
                    <form action="{{ route('Admin.affichageML.destroy', $materiel_lourd->idML) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet enregistrement ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
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
            {{ $materiel_lourds->links() }}
        </div>
    </div>
</x-app-layout>
