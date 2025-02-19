<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
            {{ __('Enregistrement des concessionaires') }}
            
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
                        <div id="container">
                            <!-- Votre formulaire d'enregistrement -->
                            <form action="{{ route('Admin.storeConcessForm') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="">Nom concessionaire</label>
                                    <input type="text" name="nomConcess" id="" class="form-control">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="">Ninéa</label>
                                    <input type="text" name="Ninea" id="" class="form-control">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="">Date début</label>
                                    <input type="date" name="Date_debut" id="" class="form-control">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="">Date fin</label>
                                    <input type="date" name="Date_fin" id="" class="form-control">
                                    
                                </div>


                                

                                <div class="form-group mb-3">
                                    <label for="Situation">Situation</label>
                                    <select name="Situation" id="Situation" class="form-control" >
                                        <option value="">Sélectionnez une situation</option>
                                        <option value="Titulaire">Titulaire</option>
                                        <option value="Appoint">Appoint</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Nom contact</label>
                                    <input type="text" name="Nom_contact" id="" class="form-control">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="">Numéro </label>
                                    <input type="text" name="Num_contact" id="" class="form-control">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="Image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    
                                </div>
                                    
                                <button type="submit" name="submit" class="btn btn-success">Enregistrer</button>    
                                <!--<button  align="right" type="button" class="btn btn-info"><a href="/Admin">Retour</a></button>-->

                                
                            </form>
                        </div>

                        
                </div>
                
        
</x-app-layout>