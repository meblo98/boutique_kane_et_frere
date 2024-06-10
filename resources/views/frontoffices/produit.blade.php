@extends('layouts.menu')
@section('content')
    
<div class="row mb-2">
    @foreach ($produits as $produit)
    <div class="col-md-4 mb-5">
       
        <div class="card" style="width: 18rem;">
            <img src="{{ asset($produit->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $produit->reference }}</h5>
              <p class="card-text">{{ $produit->categorie->libelle }}</p>
              <p class="card-text">{{ $produit->etat}}</p>
              <a href="{{route('detail', $produit->id)}}" class="btn btn-primary">Voir detail</a>
            </div>
          </div>
        
    </div>
    @endforeach
</div>
@endsection