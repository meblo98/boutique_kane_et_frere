<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('frontoffices.client', compact('produits'));
    }

    public function ajout(Request $request)
    {
        // Validation des champs
        $request->validate(
            [
                'prenom' => 'required|string|max:255',
                'nom' => 'required|string|max:255',
                'adresse' => 'required|string',
                'telephone' => 'required|integer|min:0',
                'reference' => 'required|string|max:255',
                'montant_total' => 'required|numeric|min:0',
                'etat_commande' => 'required|string|max:255',
                'produits' => 'required|array',
                'produits.*' => 'exists:produits,id',
            ],
            [
                'prenom.required' => 'Le prénom est obligatoire.',
                'nom.required' => 'Le nom est obligatoire.',
                'adresse.required' => 'L\'adresse est obligatoire.',
                'telephone.required' => 'Le téléphone est obligatoire.',
                'reference.required' => 'La référence est obligatoire.',
                'montant_total.required' => 'Le montant total est obligatoire.',
                'etat_commande.required' => 'L\'état de la commande est obligatoire.',
                'produits.required' => 'Vous devez sélectionner au moins un produit.',
                'produits.*.exists' => 'Le produit sélectionné est invalide.',
            ]
        );

        // Créer le client
        $client = Client::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
        ]);

        // Créer la commande
        $commande = Commande::create([
            'client_id' => $client->id,
            'reference' => $request->reference,
            'montant_total' => $request->montant_total,
            'etat_commande' => $request->etat_commande,
        ]);

        // Attacher les produits à la commande
        $commande->produits()->attach($request->produits);

        return redirect()->back()->with('success', 'Client et commande créés avec succès !');
    }
}
