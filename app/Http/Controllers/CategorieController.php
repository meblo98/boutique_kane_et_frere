<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    private $categories;
    public function __construct(){
        $this->categories = new Categorie();
    }

    public function index(){
        if(Auth::check()){
            $categories = Categorie::all();
            return view ('backoffices.categorie', compact('categories'));
        }

        return redirect("connexion")->withSuccess('Opps! accés refusé');

    }

    // public function ajouter(){
    //     return view ('backoffices.categorie');
    // }

    public function ajout(Request $request){

        $request->validate([
            'libelle' => 'required|string|max:255',
        ],
         [
            'libelle.required' => 'Le libellé est obligatoire.',
         ]);
        Categorie::create($request->all());
        return redirect()->back()->with('success', 'Produit ajouté avec succès!');
    }

    public function supprimer(string $id){

        $categories = $this->categories->find($id);
        $categories->delete();
        return redirect()->back();
    }
}
