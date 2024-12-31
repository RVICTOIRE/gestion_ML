<?php

namespace App\Http\Controllers;

use App\Models\CommuneOuAxe;
use App\Models\Concess;
use App\Models\Materiel_lourd;
use Hash;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
class AdminController extends Controller
{


// Page principale Admin
       public function index () {

        return view('Admin.index'); // ou n'importe quelle vue 
    }
        

// Enregistrement ML 
    public function showMLForm() {
        $concessionaires = Concess::all();
        return view('Admin.enregML', compact('concessionaires'));
    }
    public function storeMLForm (Request $request) {  
        $validatedData = $request->validate([
            'matricule' => 'required|string|max:255',
            'typeml' => 'required|string|max:255',
            'capacite' => 'required|integer|max:255',
            'idConcess' => 'required|exists:concessionaires,idConcess',
        ]);
        Materiel_lourd::create($validatedData);
        return redirect()->route('Admin.showMLForm')->with('success', 'ML enregistré avec succès');
    } 



// Enregistrement communes 
public function showCommuneForm() {
    return view('Admin.enregCommune');
}
public function storeCommuneForm (Request $request) {  
    $validatedData = $request->validate([
        'region' => 'required|string|max:255',
        'departement' => 'required|string|max:255',
        'nom_commune' => 'required|string|max:255',
        
    ]);
    CommuneOuAxe::create($validatedData);
    return redirect()->route('Admin.showCommuneForm')->with('success', 'Commune enregistrée avec succès');
    
    
} 
    

// Enregistrement concessionaires
    public function showConcessForm() {
        return view('Admin.enregConcess');
    }

    public function storeConcessForm(Request $request)
{
    $validatedData = $request->validate([
        'nomConcess' => 'required|string|max:255',
        'image' => 'image|max:2000',
    ]);

    // Vérifiez si une image a été envoyée
    if ($request->hasFile('image')) {
        // Stockez l'image dans le dossier "Admin" du disque "public"
        $imagePath = $request->file('image')->store('Admin', 'public');
        // Ajoutez le chemin de l'image au tableau des données validées
        $validatedData['image'] = $imagePath;
        
    }
        Concess::create($validatedData);
        return redirect()->route('Admin.showConcessForm')->with('success', 'Concessionaires enregistré avec succès');
    } 

    // Affichage concessionnaires
    public function showConcess()
{
    $concessionaires = concess::paginate(5);
    return view('Admin.affichageConcess', compact('concessionaires'));
}


// Mettre à jour le concessionaire avec model binding
public function updateConcess(Request $request, Concess $concessionaire)
{
    // Validation des données'Nombre_de_véhicules' => 'required|integer', 'Etat' => 'required|string',
       
    $validatedData = $request->validate([
        'nomConcess' => 'required|string|max:255',
        
    ]);

    // Mise à jour des données
    $concessionaire->update($validatedData);

    // Redirection avec un message de succès
    return redirect()->route('Admin.affichageConcess')->with('success', 'Concessionnaire mis à jour avec succès');
}


public function editConcess(Concess $concessionaire)
{
    // Passez les données directement à la vue
    return view('Admin.editConcess', compact('concessionaire'));
}


// Supprimer un concessionaire avec model binding
public function destroyConcess(Concess $concessionaire)
{
    
    $concessionaire->delete();

    return redirect()->route('Admin.affichageConcess')->with('success', 'Concessionaire supprimé avec succès');
}

  // Affichage commune
  public function showcommune()
  {
    $communeouaxes = CommuneOuAxe::paginate(5);
      return view('Admin.affichagecommune', compact('communeouaxes'));
  }
  
  // Mettre à jour commune avec model binding
  public function updatecommune(Request $request, CommuneOuAxe $communeouaxe)
  {
        $validatedData = $request->validate([
        'region' => 'required|string|max:255',
        'departement' => 'required|string|max:255',
        'nom_commune' => 'required|string|max:255',
          
      ]);
  
      // Mise à jour des données
      $communeouaxe->update($validatedData);
  
      // Redirection avec un message de succès
      return redirect()->route('Admin.affichagecommune')->with('success', 'Commune mise à jour avec succès');
  }
  
  public function editcommune(communeOuAxe $communeouaxe)
  {
      // Passez les données directement à la vue
      return view('Admin.editcommune', compact('communeouaxe'));
  }
  
  // Supprimer commune avec model binding
  public function destroycommune(communeOuAxe $communeouaxe)
  {  
    $communeouaxe->delete();
  
      return redirect()->route('Admin.affichagecommune')->with('success', 'Commune supprimée avec succès');
  }

  // Affichage Matériel lourd
  public function showML()
  {
    $materiel_lourds = Materiel_lourd::paginate(5);
      return view('Admin.affichageML', compact('materiel_lourds'));
  }
  
  // Mettre à jour ML avec model binding
  public function updateML(Request $request, Materiel_lourd $materiel_lourd)
{
    $validatedData = $request->validate([
        'matricule' => 'required|string|max:255',
        'typeml' => 'required|string|max:255',
        'capacite' => 'required|integer',
        'idConcess' => 'required|exists:concessionaires,idConcess',
    ]);

    // Mise à jour des données
    $materiel_lourd->update($validatedData);

    return redirect()->route('Admin.affichageML')->with('success', 'Matériel lourd mis à jour avec succès.');
}

  
public function editML(Materiel_lourd $materiel_lourd)
{
    $concessionaires = Concess::all(); 
    return view('Admin.editML', compact('materiel_lourd', 'concessionaires'));
}

  
  // Supprimer ML avec model binding
  public function destroyML(Materiel_lourd $materiel_lourd)
  {
      
    $materiel_lourd->delete();
  
      return redirect()->route('Admin.affichageML')->with('success', 'ML supprimée avec succès');
  }
};
