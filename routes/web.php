<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;

// Route::get('/', function () {
//     return view('authentifications.register');
// });

//creation de compte user

Route::get('/',[AuthController::class,'compte'])->name('compte');
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
