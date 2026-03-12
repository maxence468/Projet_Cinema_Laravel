@extends('layout')

@section('title', "Page de recherche d'acteur")

@section('main')
<main class="mainRechFilm">

    <!-- Formulaire de recherche -->
    <form class="pt-2" method="GET" action="{{ route('rechercheActeur') }}">
        <div class="d-flex justify-content-center">
            <input class="rech"
                   type="text"
                   name="searchActeur"
                   placeholder="Rechercher un acteur"
                   value="{{ $search ?? '' }}">
            <input type="submit" hidden/>
        </div>
    </form>

    <br>

    <!-- Carousel pour voir tout les acteurs -->
    <div id="carouselExample" class="carousel slide position-relative" data-bs-ride="carousel">
        <div class="carousel-inner">
            <h2 class="ps-3">Résultat pour l'acteur : {{ $search ?? '' }}</h2>
            @forelse($personnes as $p)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="row mt-3">
                    <!-- Actor photo -->
                        <div class="col-auto align-items-start">
                            <img src="{{$p->photoPers ?? asset('images/img.png')}} "
                                 width="412"
                                 height="626"
                                 alt="{{ $p->nomPers }}"
                                 class="smd ps-2"
                                 onerror="this.onerror=null;this.src='{{ asset('images/img.png') }}';">
                        </div>

                        <!-- Actor details -->
                        <div class="col">
                            <p>Nom : {{ $p->nomPers }}</p>
                            <p class="pt-3">Prénom : {{ $p->prePers }}</p>
                            <p class="pt-3">Date de naissance : {{ $p->dateNaissPers }}</p>
                            <p class="pt-3">Lieu de naissance : {{ $p->lieuNaissPers }}</p>
                            <p class="pt-3">Biographie : {{ $p->biblio }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="d-flex justify-content-center">Aucun acteur trouvé</p>
            @endforelse
        </div>

        <!-- Carousel controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</main>
@endsection
