<?php

namespace App\Http\Controllers;

use App\Models\PointageML;
use Illuminate\Http\Request;

class DelegueController extends Controller
{
    //index

    public function index () {

        return view('Delegue.index'); // ou n'importe quelle vue 
    }

    // Affichage pointage
    public function showPointage(Request $request)
    {

          // Récupérer les dates de recherche
        $date_debut = $request->input('date_debut');
        $date_fin = $request->input('date_fin');

        // Construire la requête en fonction des dates
         // Récupérer tous les enregistrements, y compris les supprimés
        $pointages = PointageML::withTrashed();
    

        if ($date_debut) {
            $pointages->where('Date', '>=', $date_debut);
        }

        if ($date_fin) {
            $pointages->where('Date', '<=', $date_fin);
        }

        // Paginer les résultats
        $pointages = $pointages->paginate(05);

        // Retourner la vue avec les données filtrées
        return view('Delegue.AffichagePointageD', compact('pointages'));
    }


    public function calculTonnage(Request $request)
{
    $date_debut = $request->input('date_debut');
    $date_fin = $request->input('date_fin');

    $pointages = PointageML::with(['materielLourd.concessionnaire', 'communeOuAxe'])
        ->when($date_debut && $date_fin, function ($query) use ($date_debut, $date_fin) {
            return $query->whereBetween('Date', [$date_debut, $date_fin]);
        })
        ->get();

    return view('Delegue.calcultonnage', compact('pointages', 'date_debut', 'date_fin'));
}

}






