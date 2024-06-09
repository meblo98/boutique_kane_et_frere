@extends('layouts.app')
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
                    <h1>Créé un produit</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="products.html" class="btn btn-primary">Retour</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <form action="{{ route('modification', $produits->id) }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            @method('PATCH')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Réference</label>
                                            <input type="text" name="reference" value="{{ $produits->reference }}" id="reference" class="form-control"
                                                placeholder="Réference">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Désignation</label>
                                            <input type="text" value="{{ $produits->designation }}" name="designation" id="designation"
                                                class="form-control" placeholder="Désignation">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Image</h2>
                                <div id="image" class="dropzone dz-clickable">
                                    <input type="file" class="form-control" value="{{ $produits->image }}" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price">Prix</label>
                                            <input type="number" value="{{ $produits->prix_unitaire }}"  name="prix_unitaire" id="prix_unitaire"
                                                class="form-control" placeholder="Prix unitaire">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price">Quantité</label>
                                            <input type="number" min="0" value="{{ $produits->quantite }}" name="quantite" id="quantite"
                                                class="form-control" placeholder="Quantité">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">État produit</h2>
                                <div class="mb-3">
                                    <select name="etat" id="etat" class="form-control">
                                        <option value="disponible">Disponible</option>
                                        <option value="en_rupture">En rupture</option>
                                        <option value="en_stock">En stock</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="category">Categorie</label>
                                    <select name="categorie_id"  id="categorie" class="form-control">
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <input type="hidden" value="{{ Auth::User()->id }}" name="user_id">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                    <a href="products.html" class="btn btn-outline-dark ml-3">Annuler</a>
                </div>
            </div>
        </form>


    </section>

</div>
@endsection
