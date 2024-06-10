<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        return view ('frontoffices.client');
    }

    public function ajout(Request $request){
         // Validation des champs
         $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string',
            'telephone' => 'required|integer|min:0',
        ]
        ,[
            'pronom.required' => 'La refernce est obligatoire.',
            'nom.required' => 'La designation est obligatoire.',
            'adresse.required' => 'Adress est obligatoire.',
            'telephone.required' => 'a quantité est obligatoire.',

        ]
    );
    $client = new Client();
    $client->create($request->all());
    return redirect('frontoffices.commande')->with('success', 'Données ajouté avec succès!');
    }
}
