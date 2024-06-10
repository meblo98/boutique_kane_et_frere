@extends('layouts.menu')
@section('content')
<main class="container">
    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                Detail du produit {{ $produits->nom }}
            </h3>

            <article class="blog-post">
                <h2>{{ $produits->nom }}</h2>
                <p><img width="100%" height="100%" src="{{asset($produits->image)}}" alt="" srcset=""></p>
                <blockquote class="blockquote">
                    <p>Description : </p>
                </blockquote>
                <p>{{ $produits->description }}</p>
                <h4>Prix: {{ $produits->prix_unitaire }} FCFA</h4>
                    highly repetitive body text used throughout.</p>
            </article>

            <nav class="blog-pagination" aria-label="Pagination">
                <a class="btn btn-outline-primary rounded-pill" href="{{route('client')}}">Commander</a>
                <a class="btn btn-outline-secondary rounded-pill disabled" href="{{route('accueil')}}" aria-disabled="true">Retourner</a>
            </nav>

        </div>

        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-body-tertiary rounded">
                    <h4 class="fst-italic">A propos</h4>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et vulputate neque. Aliquam sollicitudin rhoncus mi at fermentum. Morbi non.</p>
                </div>

                <div>
                    <h4 class="fst-italic">Produit recents</h4>
                    <ul class="list-unstyled">
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="#">
                                <svg class="bd-placeholder-img" width="100%" height="96"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <rect width="100%" height="100%" fill="#777" />
                                </svg>
                                <div class="col-lg-8">
                                    <h6 class="mb-0">Example blog post title</h6>
                                    <small class="text-body-secondary">January 15, 2024</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="#">
                                <svg class="bd-placeholder-img" width="100%" height="96"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <rect width="100%" height="100%" fill="#777" />
                                </svg>
                                <div class="col-lg-8">
                                    <h6 class="mb-0">This is another blog post title</h6>
                                    <small class="text-body-secondary">January 14, 2024</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="#">
                                <svg class="bd-placeholder-img" width="100%" height="96"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <rect width="100%" height="100%" fill="#777" />
                                </svg>
                                <div class="col-lg-8">
                                    <h6 class="mb-0">Longer blog post title: This one has multiple lines!</h6>
                                    <small class="text-body-secondary">January 13, 2024</small>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</main>
@endsection