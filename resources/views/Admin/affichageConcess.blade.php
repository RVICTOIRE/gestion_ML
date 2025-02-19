
    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Liste des concessionaires de la SONAGED') }}
            
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
                        <th scope="col">Concessionnaires</th>
                        <th scope="col">Ninéa</th>
                        <th scope="col">Date de début</th>
                        <th scope="col">Date de fin</th>
                        <th scope="col">Situation</th>
                        <th scope="col">Nom contact</th>
                        <th scope="col">Téléphone</th>

                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($concessionaires as $concessionnaire)
                        <tr>
                            <td>{{ $concessionnaire->nomConcess }}</td>
                            <td>{{ $concessionnaire->Ninea }}</td>
                            <td>{{ $concessionnaire->Date_debut }}</td>
                            <td>{{ $concessionnaire->Date_fin }}</td>
                            <td>{{ $concessionnaire->Situation }}</td>
                            <td>{{ $concessionnaire->Nom_contact }}</td>
                            <td>{{ $concessionnaire->Num_contact }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <!-- Bouton Modifier -->
                                    <a href="{{ route('Admin.affichageConcess.edit', $concessionnaire->idConcess) }}" class="btn btn-primary btn-sm">
                                        Modifier
                                    </a>
                                    <!-- Formulaire pour le bouton Supprimer -->
                                    <form action="{{ route('Admin.affichageConcess.destroy', $concessionnaire->idConcess) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet enregistrement ?');">
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
           {{ $concessionaires->links() }}
        </div>


    </div>
</x-app-layout>
