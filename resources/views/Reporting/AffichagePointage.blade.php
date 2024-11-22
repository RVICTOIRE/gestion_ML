<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
            {{ __('Liste des pointages effectués') }}
        </h2>
    </x-slot>

    <form action="" method="post" class="mb-3">
            <div class="form-row">

            <div class="col">
                    
                     
                </div>
  
                <div class="col">
                    <label for="date_debut">Date de début :</label>
                    <input type="date" name="date_debut" id="date_debut" class="form-control">
                </div>
                <div class="col">
                    <label for="date_fin">Date de fin :</label>
                    <input type="date" name="date_fin" id="date_fin" class="form-control">
                </div>

                <div class="col">
                    <button type="submit" name="rechercher" class="btn btn-success">Rechercher</button>
                     
                </div>
               
            </div>
        </form>
        <form action="" method="post">
            <table class="table table-bordered table-hover">
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
                                    <div class="d-flex">
                                        <!-- Bouton Modifier -->
                                        <a href="{{ route('Reporting.affichagePointage.edit', $pointage->idPointage) }}" class="btn btn-primary mr-2">Modifier</a>
                                        
                                        <!-- Formulaire pour le bouton Supprimer -->
                                        <form action="{{ route('Reporting.affichagePointage.destroy', $pointage->idPointage) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet enregistrement ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                    </td>
                                </tr>
                        @endforeach

                    </tbody>
                </table>
        
    </div>
    </form>


</x-app-layout>