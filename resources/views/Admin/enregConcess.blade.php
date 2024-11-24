<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
            {{ __('Enregistrement des concessionaires') }}
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
                            <form action="{{ route('Admin.storeConcessForm') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="">Nom concessionaire</label>
                                    <input type="text" name="nomConcess" id="" class="form-control">
                                    
                                </div>

                                <div class="form-group">
                                    <label for="Image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    
                                </div>
                                    
                                <button type="submit" name="submit" class="btn btn-success">Enregistrer</button>    
                                <button  align="right" type="button" class="btn btn-info"><a href="/Admin">Retour</a></button>

                                
                            </form>
                        </div>

                        
                </div>
                
        
</x-app-layout>