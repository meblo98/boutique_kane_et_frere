<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{

    private $produits;
    public function __construct()
    {
        $this->produits = new Produit();
    }

    public function index()
    {
        $produits = Produit::paginate(5);
        return view('backoffices.produit', compact('produits'));
    }
    public function accueil(){
        $produits = Produit::latest()->take(6)->get();
        return view ('frontoffices.index', compact('produits')); 

    }
    public function produit(){
        $produits = Produit::all();
        return view ('frontoffices.produit', compact('produits')); 
    }

    public function detail($id){
        $produits = Produit::find($id);
        return view ('frontoffices.detail', compact('produits'));
    }

    public function ajout()
    {

        $user = User::all();
        $categories = Categorie::all();
        return view('backoffices.ajout_produit', compact('user', 'categories'));
    }

    public function ajouter(Request $request)
    {


        // Validation des champs
        $request->validate([
            'reference' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'prix_unitaire' => 'required|numeric',
            'quantite' => 'required|integer|min:0',
            'etat' => 'required|string',
            'categorie_id' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]
        ,[
            'reference.required' => 'La refernce est obligatoire.',
            'designation.required' => 'La designation est obligatoire.',
            'prix_unitaire.required' => 'Le prix est obligatoire.',
            'quantite.required' => 'a quantité est obligatoire.',
            'image.required' => 'L\'image est obligatoire.',
            'categorie_id.required' => 'La categorie est obligatoire.',

        ]
    );

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('image'), $imageName);
            $path = 'image/' . $imageName;
        }
        // Création du produit
        $produit = new Produit;
        $produit->reference = $request->reference;
        $produit->designation = $request->designation;
        $produit->prix_unitaire = $request->prix_unitaire;
        $produit->quantite = $request->quantite;
        $produit->etat = $request->etat;
        $produit->categorie_id = $request->categorie_id;
        $produit->user_id = $request->user()->id;
        $produit->image = $path;
        $produit->save();


        // $this->produits->create($request->all());
        return redirect()->back()->with('success', 'Produit ajouté avec succès!');
    }

    public function supprimer(string $id){

        $produits = $this->produits->find($id);
        $produits->delete();
        return redirect()->back();
    }
    public function modifier(string $id)
    {
        $produits = $this->produits->find($id);
        $categories = Categorie::all();
        return view('backoffices.modifier_produit')->with(['produits' => $produits, 'categories' => $categories]);
    }


    public function modification(Request $request, string $id){

    $produit = $this->produits->find($id);
    $produit->update($request->all());
    return redirect('produit')->with('success', 'Produit modifié avec succès!');
    }
}
