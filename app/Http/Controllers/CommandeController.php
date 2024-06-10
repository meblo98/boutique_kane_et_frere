<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index(){
        $clients = Client::all();
        return view ('backoffices.commande', compact('clients'));
    }

    public function ajout(Request $request){
        $client = Client::find($request->input('client_id'));
    }
}
