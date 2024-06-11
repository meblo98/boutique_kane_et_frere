<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CategorieController;

// Route::get('/', function () {
//     return view('authentifications.register');
// });

//creation de compte user


Route::get('/compte',[AuthController::class,'compte'])->name('compte');
Route::post('/compte',[AuthController::class,'creerCompte'])->name('creerCompte');

//conexion user

Route::get('/connexion',[AuthController::class,'connexion'])->name('connecter');
Route::post('/connexion',[AuthController::class,'connecter'])->name('connexion');

// deconnexion
Route::delete('connexion',[AuthController::class, 'deconnexion'])->name('deconnexion');

// --------------------------Backoffice---------------------------------------------------------------

// dashboard

Route::get('/admin', [AuthController::class, 'dashboard'])->name('dashboard');

// categorie

Route::get('categorie', [CategorieController::class, 'index'])->name('categorie');
Route::post('categorie/ajout', [CategorieController::class, 'ajout'])->name('ajoutCategorie');
Route::delete('categorie/{id}', [CategorieController::class, 'supprimer'])->name('deleteCategorie');

// produit

Route::get('produit', [ProduitController::class, 'index'])->name('produit');
Route::get('ajout', [ProduitController::class, 'ajout'])->name('ajout');
Route::post('ajouter', [ProduitController::class, 'ajouter'])->name('ajouter');
Route::get('modifer/{id}', [ProduitController::class, 'modifier'])->name('modifier');
Route::patch('modifier/{id}', [ProduitController::class, 'modification'])->name('modification');
Route::delete('ajout/{id}', [ProduitController::class, 'supprimer'])->name('deleteProduit');

// commande

Route::get('commandeProduit', [CommandeController::class, 'index'])->name('commande');
Route::get('commandeProduit/{id}', [CommandeController::class, 'modifier'])->name('modifier');
Route::patch('commandeProduit/{id}', [CommandeController::class, 'modification'])->name('modification');


// ---------------------------frontoffice----------------------------------------------

Route::get('/', [ProduitController::class, 'accueil'])->name('accueil');
Route::get('accueil', [ProduitController::class, 'accueil'])->name('accueil');

// produits
Route::get('produit', [ProduitController::class, 'produit'])->name('accueil.produit');
Route::get('produit/detail/{id}', [ProduitController::class, 'detail'])->name('detail');

// client

Route::get('commande', [ClientController::class, 'index'])->name('client');
Route::post('commande', [ClientController::class, 'ajout'])->name('ajoutClient');
