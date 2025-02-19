<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Configuration') }}
        </h2>
    </x-slot>

    <br>
    <br>
    <br>
    <br>

    <!-- Contenu principal de la page -->
    <div class="container text-center mt-4">
    <div class="row mb-3">
        <div class="col-md-4 mb-2">
            <a href="Admin/enregConcess" class="btn btn-success btn-block">Enregistrement des concessionnaires</a>
        </div>
        <div class="col-md-4 mb-2">
            <a href="Admin/enregCommune" class="btn btn-success btn-block">Enregistrement des communes</a>
        </div>
        <div class="col-md-4 mb-2">
            <a href="Admin/enregML" class="btn btn-success btn-block">Enregistrement du matériel lourd</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-2">
            <a href="Admin/affichageConcess" class="btn btn-success btn-block">Liste des concessionnaires</a>
        </div>
        <div class="col-md-4 mb-2">
            <a href="Admin/affichagecommune" class="btn btn-success btn-block">Liste des communes</a>
        </div>
        <div class="col-md-4 mb-2">
            <a href="Admin/affichageML" class="btn btn-success btn-block">Liste du matériel lourd</a>
        </div>
    </div>
</div>

</x-app-layout>
