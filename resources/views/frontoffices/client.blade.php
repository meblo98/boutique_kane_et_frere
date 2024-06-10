@extends('layouts.menu')
@section('content')
<div class="content-wrapper">
    <section class="content-header mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Formulaire</h1>
                    <p>Veuillez remplir tous les champs pour continuer</p>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="{{ route('ajoutClient') }}" method="post">
            @csrf
            @method('POST')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Champs pour les informations du client -->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="prenom">Prenom</label>
                                            <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prenom" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="nom">Nom</label>
                                            <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="adresse">Adresse</label>
                                            <input type="text" name="adresse" id="adresse" class="form-control" placeholder="Adresse" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="telephone">Téléphone</label>
                                            <input type="number" name="telephone" id="telephone" class="form-control" placeholder="Téléphone" required>
                                        </div>
                                    </div>
                                    <!-- Champs pour les informations de la commande -->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="reference">Référence</label>
                                            <input type="text" name="reference" id="reference" class="form-control" placeholder="Référence" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="montant_total">Montant Total</label>
                                            <input type="number" name="montant_total"  id="montant_total" class="form-control" placeholder="Montant Total" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="etat_commande">État de la Commande</label>
                                            <input type="text" name="etat_commande" id="etat_commande" class="form-control" placeholder="État de la Commande" required>
                                        </div>
                                    </div>
                                    <!-- Sélection des produits -->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="produits">Produits</label>
                                            <select name="produits[]" id="produits" class="form-control" multiple required>
                                                @foreach ($produits as $produit)
                                                    <option value="{{ $produit->id }}">{{ $produit->designation }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pb-5 pt-3">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            <a href="{{ route('accueil') }}" class="btn btn-outline-dark ml-3">Annuler</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
@endsection
