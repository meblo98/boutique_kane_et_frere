<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;

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

// Backoffice

Route::get('/admin', [AuthController::class, 'dashboard'])->name('dashboard');

// categorie

Route::get('categorie', [CategorieController::class, 'index'])->name('categorie');
Route::post('categorie', [CategorieController::class, 'ajout'])->name('ajoutCategorie');