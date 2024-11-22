<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function LoginN(){


        return view('Auth.LoginN');
    }


    public function Logout()
{
    
    auth::Logout();

    return redirect()->route('Auth.LoginN'); 
}



    public function doLogin(LoginRequest $request){

        $credentials  = $request ->validated();

        // Tentative de connexion avec les informations fournies
    if (Auth::attempt($credentials)) {
        // Si la connexion est réussie, on régénère la session
        $request->session()->regenerate();

        // Redirection vers la page d'accueil ou le tableau de bord
        return redirect()->intended(route('Admin.index'))->with('success', 'Connexion réussie !');
    }
      
    // En cas d’échec, on retourne à la page de connexion avec un message d’erreur
    return back()->withErrors([
        'email' => 'Les identifiants sont incorrects.',
    ])->onlyInput('email');
        
       
    }

}
