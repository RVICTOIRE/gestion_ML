<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enregistrement du matériel lourd') }}
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
                            <form action="{{ route('Admin.storeMLForm') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label for="">Matricule</label>
                                    <input type="text" name="matricule" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Type de matériel lourd</label>
                                    <input type="text" name="typeml" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Capacité</label>
                                    <input type="text" name="capacite" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="idConcess">Concessionnaire</label>
                                    <select name="idConcess" class="form-control">
                                        <option value=""></option>
                                        @foreach($concessionaires as $concessionaire)
                                            <option value="{{ $concessionaire->idConcess }}">{{ $concessionaire->nomConcess }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    
                                <button type="submit" name="submit" class="btn btn-success">Enregistrer</button>
                                <button  align="right" type="button" class="btn btn-info"><a href="/Admin">Retour</a></button>


                            </form>
                        </div>
                </div>
                
        
</x-app-layout>