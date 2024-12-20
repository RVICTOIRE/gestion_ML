<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Liste des concessionnaires de la SONAGED') }}
        </h2>
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
                        <th scope="col">Nombre de véhicules</th>
                        <th scope="col">État</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($concessionaires as $concessionnaire)
                        <tr>
                            <td>{{ $concessionnaire->nomConcess }}</td>
                            <td>{{ $concessionnaire->NombreVehicule }}</td>
                            <td>{{ $concessionnaire->Etat }}</td>
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
    </div>
</x-app-layout>
