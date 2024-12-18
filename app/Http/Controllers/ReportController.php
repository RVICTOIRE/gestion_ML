<?php

namespace App\Http\Controllers;

use App\Models\CommuneOuAxe;
use App\Models\Concess;
use App\Models\Materiel_lourd;
use App\Models\PointageML;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //index

    public function index () {

        return view('Reporting.index'); // ou n'importe quelle vue 
    }


    // Enregistrement pointage
    public function showPointageForm() {
        $communeOuAxe = CommuneOuAxe::all();
        $Materiel_lourd = Materiel_lourd::all();
        return view('Reporting.enregPointage', compact('communeOuAxe', 'Materiel_lourd'));
    }
    public function storePointageForm (Request $request) {  
        $validatedData = $request->validate([
            'Date' => 'required|date',
            'Fonctionnel' => 'boolean',
            'Rotation' => 'integer|max:8',
            'idCommune' => 'required|exists:communeOuAxe,id',
            'idML' => 'required|exists:materiel_lourd,idML',
        ]);
        PointageML::create($validatedData);

        return redirect()->route('Reporting.showPointageForm')->with('success', 'Pointage enregistré avec succès');
    } 


    // Affichage pointage
    public function showPointage()
{
    // Récupérer tous les pointages
    $pointages = PointageML::with(['materielLourd.concessionnaire', 'communeOuAxe'])->get();

    // Retourner la vue avec les données
    return view('Reporting.affichagePointage',compact('pointages') );
}
 
        // Afficher le formulaire d'édition avec model binding
        public function editPointage(PointageML $pointage)
        {
            $pointage = PointageML::findOrFail( $pointage->idPointage );
            $materielsLourds = Materiel_lourd::all(); // Ajustez selon votre modèle
            $communes = CommuneOuAxe::all(); // Ajustez selon votre modèle
            return view('Reporting.editPointage', compact('pointage', 'materielsLourds', 'communes'))->with('success', 'Pointage modifié avec succès');
        }
    
        // Mettre à jour le pointage avec model binding
        public function updatePointage(Request $request, PointageML $pointage)
        {

            //dd($request->all());
            // Validation des données
            $validatedData = $request->validate([
                'Date' => 'required|date',
                'Fonctionnel' => 'boolean',
                'Rotation' => 'integer|max:8',
                'idCommune' => 'required|exists:communeOuAxe,id',
                'idML' => 'required|exists:materiel_lourd,idML',
            ]);
            
            // Forcer Fonctionnel à 0 si la case est décochée
            $validatedData['Fonctionnel'] = $request->Fonctionnel ? 1 : 0;

            // Réinitialiser Rotation si non fonctionnel
                if (!$validatedData['Fonctionnel']) {
                    $validatedData['Rotation'] = 0;
                }
                
                
            // Mise à jour des données
            $result=$pointage->update($validatedData);
            //dd($result);
            return redirect()->route('Reporting.affichagePointage')->with('success', 'Pointage mis à jour avec succès');
        }

    
        // Supprimer un pointage avec model binding
        public function destroyPointage(PointageML $pointage)
        {
            
            $pointage->delete();
    
            return redirect()->route('Reporting.affichagePointage')->with('success', 'Pointage supprimé avec succès');
        }
    }
    