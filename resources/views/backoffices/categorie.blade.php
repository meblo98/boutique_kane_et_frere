@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
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
            <h4>Ajouter une catégorie</h4>
            <form class="row g-3" action = "{{ route('ajoutCategorie') }}" method="post">
                @method('POST')
                @csrf
                <div class="col-auto">
                    <input type="text" class="form-control" name="libelle" id="libelle" placeholder="Catégorie">
                    @error('libelle')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-info">Ajouter</button>
                </div>
            </form>
        </div>
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des catégories</h4>

                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Libellé</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            @foreach ($categories as $categorie)
                                <tbody>
                                    <tr class="table-info">
                                        <td> {{ $categorie->id }}</td>
                                        <td> {{ $categorie->libelle }}</td>
                                        <td>
                                            <a class="btn d-inline-flex mb-3" href="">
                                                <i class="fa fa-edit"> </i>
                                            </a>
                                            <form action="{{ route('deleteCategorie', $categorie->id) }}" method="POST"
                                                style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-trash"></i>
                                                    supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
