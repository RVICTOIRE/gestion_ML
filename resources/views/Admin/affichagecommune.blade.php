
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Liste des communes et axes') }}
            
        </h2>
        <a href="{{ route('Admin.index') }}" class="btn btn-outline-primary btn-sm">Accueil</a>
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
                        <th scope="col">Région</th>
                        <th scope="col">Département</th>
                        <th scope="col">Commune ou axe</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($communeouaxes as $communeouaxe)
                        <tr>
                            <td>{{ $communeouaxe->region }}</td>
                            <td>{{ $communeouaxe->departement }}</td>
                            <td>{{ $communeouaxe->nom_commune }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <!-- Bouton Modifier -->
                                    <a href="{{ route('Admin.affichagecommune.edit', $communeouaxe->id) }}" class="btn btn-primary btn-sm">
                                        Modifier
                                    </a>
                                    <!-- Formulaire pour le bouton Supprimer -->
                                    <form action="{{ route('Admin.affichagecommune.destroy', $communeouaxe->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet enregistrement ?');">
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
        {{ $communeouaxes ->links() }}
        </div>


    </div>
</x-app-layout>
