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

                            {{-- <th width="80"></th> --}}
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Qté</th>
                            {{-- <th>Catégorie</th>
                            <th width="100">État</th> --}}
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    @foreach ($commandes as $commande)
                        <tbody>
                            <tr class="table-info">

                                {{-- <td><img src="{{ asset($commande->montant_commande) }}" class="img-thumbnail" alt="" width="50" ></td> --}}

                                <td> {{ $commande->reference }}</td>
                                <td> {{ $commande->montant_total }}</td>
                                {{-- <td> {{ $commande->quantite }}</td> --}}

                                <td> {{ $commande->etat_commande }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('modifier',$commande->id) }}"><i class="fa fa-edit"> </i></a>
                                    <form action="{{ route('deleteProduit', $commande->id) }}" method="POST"
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
              {{-- <li class="page-item"><a class="page-link" href="{{ $commande->links() }}">1</a></li> --}}
              <li class="page-item"><a class="page-link" href="">2</a></li>
              <li class="page-item"><a class="page-link" href="">3</a></li>
              <li class="page-item"><a class="page-link" href="">»</a></li>
            </ul>
        </div>
    </div>
</div>

@endsection
