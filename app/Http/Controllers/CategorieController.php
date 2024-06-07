<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        return view ('backoffices.categorie');
    }
    public function ajout(Request $request){
        $categorie = new Categorie();
        Categorie::create($request->all());
        return redirect()->back();
    }
}
