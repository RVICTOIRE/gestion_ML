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

                                <div class="form-group">
                                    <label for="">Ninéa</label>
                                    <input type="text" name="Ninea" id="" class="form-control"
                                    value="{{ old('Ninea', $concessionaire->Ninea) }}" required>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="">Date début</label>
                                    <input type="date" name="Date_debut" id="" class="form-control"
                                    value="{{ old('Date_debut', $concessionaire->Date_debut) }}" required>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="">Date fin</label>
                                    <input type="date" name="Date_fin" id="" class="form-control"
                                    value="{{ old('Date_fin', $concessionaire->Date_fin) }}" required>
                                    
                                </div>


                                

                                <div class="form-group mb-3">
                                    <label for="Situation">Situation</label>
                                    <select name="Situation" id="Situation" class="form-control"
                                    value="{{ old('Situation', $concessionaire->Situation) }}" required></select>>
                                        <option value="">Sélectionnez une situation</option>
                                        <option value="Titulaire">Titulaire</option>
                                        <option value="Appoint">Appoint</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Nom contact</label>
                                    <input type="text" name="Nom_contact" id="" class="form-control"
                                    value="{{ old('Nom_contact', $concessionaire->Nom_contact) }}" required>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="">Numéro </label>
                                    <input type="text" name="Num_contact" id="" class="form-control"
                                    value="{{ old('Num_contact', $concessionaire->Num_contact) }}" required>>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="Image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    
                                </div>
           

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <!--<a href="{{ route('Admin.affichageConcess') }}" class="btn btn-secondary">Annuler</a>-->
        </form>
    </div>

    
</x-app-layout>
