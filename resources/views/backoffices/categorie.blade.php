@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <h4>Ajouter une catégorie</h4>
            <form class="row g-3" action = "{{ route('ajoutCategorie') }}">
                @csrf
                @method('POST')
                <div class="col-auto">
                  <label for="staticEmail2" class="visually-hidden">Email</label>
                  <input type="text" name="libelle" readonly class="form-control-plaintext" id="staticEmail2" value="Catégorie">
                </div>
                <div class="col-auto">
                  <label for="inputPassword2" class="visually-hidden">categorie</label>
                  <input type="text" class="form-control" name="libelle" id="libelle" placeholder="Catégorie">
                </div>
                <div class="col-auto">
                  <button type="submit" class="btn btn-primary mb-3">Ajouter</button>
                </div>
              </form>
        </div>
    </div>
@endsection
