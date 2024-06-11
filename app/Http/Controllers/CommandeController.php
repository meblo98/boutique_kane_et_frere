<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function index(){

        if(Auth::check()){
            $commandes = Commande::paginate(5);

            return view ('backoffices.commande', compact('commandes'));
        }

        return redirect("connexion")->withSuccess('Opps! accés refusé');

    }

    public function ajout(Request $request){
        $client = Client::find($request->input('client_id'));
    }
    public function modifier(string $id){
        if(Auth::check()){
            $commande = Commande::find($id);
            return view ('backoffices.modifier_commande', compact('commande'));
        }

        return redirect("connexion")->withSuccess('Opps! accés refusé');

    }

    public function modification(Request $request, string $id){

        $commande = Commande::find($id);
        $commande->update($request->all());
        return redirect()->route('commande');
    }
}
