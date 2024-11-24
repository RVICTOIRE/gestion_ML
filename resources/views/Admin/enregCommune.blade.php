<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
            {{ __('Enregistrement des communes ou axes') }}
        </h2>
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
                            <form action="{{ route('Admin.storeCommuneForm') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label for="">Région</label>   
                                    <select name="region" id=""  class="form-control">
                                        <option value=""></option>
                                        <option value="">Dakar</option>
                                        <option value="">Thies</option>
                                        <option value="">Louga</option>
                                        <option value="">Kaolack</option>
                                        <option value="">Kaffrine</option>
                                        <option value="">Fatick</option>
                                        <option value="">Saint-Louis</option>
                                        <option value="">Matam</option>
                                        <option value="">Kédougou</option>
                                        <option value="">Matam</option>
                                        <option value="">Sédhiou</option>
                                        <option value="">Kolda</option>
                                        <option value="">Diourbel</option>
                                        <option value="">Ziguinchor</option>
                                    </select>
                                
                                </div>

                                <div class="form-group">
                                    <label for="">Départements</label>
                                    <input type="text" name="departement" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Communes ou Axe</label>
                                    <input type="text" name="nom_commune" id="" class="form-control">
                                </div>
                                <button type="submit" name="submit" class="btn btn-success">Enregistrer</button>
                                <button  align="right" type="button" class="btn btn-info"><a href="/Admin">Retour</a></button>    
                            </form>
                                    
                            
                            
                               


                            
                        </div>
                </div>
                
</x-app-layout>