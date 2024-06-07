<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function compte(){
        return view('authentifications/register');
    }
    //
    public function creerCompte(Request $request){
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ],
         [
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être une adresse valide.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
         ]);
        $user=new User();
        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();

        return view('authentifications.login')->with('success','compte créer avec sucess');
    }
    public function connexion(){
        return view('authentifications.login');
    }
    public function connecter(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ],[
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être une adresse valide.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ]
    );
        $credentials=[
            'email' => $request->email,
            'password'=>$request->password,
        ];
        if(Auth::attempt($credentials)){
           return redirect()->route('dashboard')->with('success','Connexion');

        }else{
            return back()->with('error','Email ou mots de passe incorrect');
        }


    }
    public function dashboard(){
        return view('backoffices.dashboard');
    }
    public function deconnexion(){
        Auth::logout();
        return redirect('connexion');
    }
}
