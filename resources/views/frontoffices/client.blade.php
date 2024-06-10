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
                    <p>Veiller remplire tous les champs pour continuer</p>
                </div>

            </div>
        </div>
    </section>

    <section class="content">

        <form action="{{ route('ajoutClient') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Prenom</label>
                                            <input type="text" name="prenom" id="nom" class="form-control"
                                                placeholder="prenom">
                                        </div>
                                    </div>      <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Nom</label>

                                            <input type="text" name="nom" id="nom" class="form-control"
                                                placeholder="nom">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Adresse</label>
                                            <input type="text" name="adresse" id="adresse" class="form-control"
                                                placeholder="adresse">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Téléphone</label>
                                            <input type="number" name="telephone" id="telephone"
                                                class="form-control" placeholder="telephone">
                                        </div>
                                    </div>

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
        </form>


    </section>

</div>
@endsection
