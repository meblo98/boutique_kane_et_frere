@extends('layouts.app')
@section('content')



<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Liste des catégories</h4>

            <div class="col-sm-6 text-right">
                <a href="{{route('ajout')}}" class="btn btn-primary">Ajouter un produit</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>

                            <th width="80"></th>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Qté</th>
                            <th>Catégorie</th>
                            <th width="100">État</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    @foreach ($produits as $produit)
                        <tbody>
                            <tr class="table-info">

                                <td><img src="{{ asset($produit->image) }}" class="img-thumbnail" alt="" width="50" ></td>
                                <td> {{ $produit->reference }}</td>
                                <td> {{ $produit->prix_unitaire }}</td>
                                <td> {{ $produit->quantite }}</td>
                                <td>{{ $produit->categorie->libelle }}</td>
                                <td> {{ $produit->etat }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('modifier',$produit->id) }}"><i class="fa fa-edit"> </i></a>
                                    <form action="{{ route('deleteProduit', $produit->id) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
     
        </div>
        <div class="card-footer clearfix">
            <ul class="pagination pagination m-0 float-right">
              <li class="page-item"><a class="page-link" href="">«</a></li>
              <li class="page-item"><a class="page-link" href="{{ $produits->links() }}">1</a></li>
              <li class="page-item"><a class="page-link" href="">2</a></li>
              <li class="page-item"><a class="page-link" href="">3</a></li>
              <li class="page-item"><a class="page-link" href="">»</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
