<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
            {{ __('Cher admin, veuillez executer une tâche svp') }}
        </h2>
    </x-slot>

    <br>
    <br>
    <br>
    <br>

    <!-- Contenu principal de la page -->
    <div class="container text-center">
        <div class="row">
            <div class="col align-self-start">
                <a href="Admin/enregConcess" class="btn btn-success btn-block">Enregistrement des concessionnaires</a>
            </div>
            <div class="col align-self-center">
                <a href="Admin/enregCommune" class="btn btn-success btn-block">Enregistrement des communes</a>
            </div>
            <div class="col align-self-end">
                <a href="Admin/affichageConcess" class="btn btn-success btn-block">Liste des concessionaires</a>
            </div>
        </div>
    </div>
</x-app-layout>
