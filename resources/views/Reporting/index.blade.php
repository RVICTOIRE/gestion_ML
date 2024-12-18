<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
            {{ __('veuillez executer une tâche svp') }}
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
                <a href="Reporting/enregPointage" class="btn btn-success btn-block">Enregistrement des pointages du matériel lourd</a>
            </div>
            <div class="col align-self-center">
                <a href="Reporting/affichagePointage" class="btn btn-success btn-block">Fiche de suivi</a>
            </div>
            <div class="col align-self-end">
                <a href="" class="btn btn-success btn-block">Enregistrement du matériel lourd</a>
            </div>
        </div>
    </div>
</x-app-layout>