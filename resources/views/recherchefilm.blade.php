@php
    use Illuminate\Support\Carbon;
@endphp

@extends('layout')

@section('title', 'Page recherche de film')

@section('main')

<main class="mainRechFilm">

    <!-- Formulaire de recherche -->
    <form class="pt-2" method="GET" action="{{ route('recherchefilm') }}">
        <div class="d-flex justify-content-center">
            <input class="rech"
                   type="text" name="search"
                   placeholder="Rechercher un film"
                   value="{{ $search ?? '' }}">
            <input id="searchInput" type="submit" hidden/>
        </div>
    </form>

    <br>

    <!-- Carousel pour voir tout les films -->
    <div id="carouselExample" class="carousel slide position-relative" data-bs-ride="carousel">
        <div class="carousel-inner">
            <h2>Résultat de films pour : {{ $search ?? '' }}</h2>
            @forelse($films as $film)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="row align-items-start">
                        <div class="col-auto">
                            @if($film->posterFilm)
                                <html>
                                <img src="{{ $film->posterFilm }}"
                                     width="412"
                                     height="626"
                                     alt="{{ $film->titreFilm }}"
                                     class="smd">
                                </html>

                            @else

                                <html>
                                <img src="{{ asset('images/img.png')}}"
                                     width="412"
                                     height="626"
                                     alt="{{ $film->titreFilm }}"
                                     class="smd">
                                </html>

                            @endif
                        </div>

                        <div class="col">
                            <p>Titre : {{$film->titreFilm}}</p>
                            <p class="pt-3">Description : {{$film->descFilm}}</p>
                            <p class="pt-3">Genre : {{$film->genre->libGenre}}</p>
                            <p class="pt-3">Réalisateurs :
                                @foreach($film->realisateurs as $r)
                                    {{$r->nomPers}} {{$r->prePers}}{{ $loop->last ? '' : ',' }}
                                @endforeach
                            </p>
                            {{-- Faire la boucle foreach pour mettre le casting --}}
                            <p class="pt-3">Casting :
                                @foreach($film->casting as $c)
                                    {{$c->nomPers}} {{$c->prePers}}{{ $loop->last ? '' : ',' }}
                                @endforeach
                            </p>
                            <p class="pt-3">Durée : {{$film->dureeFilm}} minutes</p>
                            @if($film->seances->isEmpty())
                                <p>Aucune seance disponible</p>
                            @elseif(Carbon::parse($film->seances[0]->dateSeance)->lt(Carbon::today()))
                                <p>Aucune seance disponible</p>
                            @else
                                <p class="pt-3">Disponible au cinema : <br><br>
                                    @foreach($film->seances as $s)
                                        le {{$s->dateSeance->format('d/m/Y')}} à {{$s->heureSeance->format('H:i')}} au cinéma {{ $s->salle->cinema->nomCinema }}
                                        @auth
                                            @if(Auth::user()->isAdmin())


                                            @else
                                                <br><a href="/effectuerReservation/{{ $s->idSeance }}" class="btnReservRechFilm">Réserver</a>
                                            @endif
                                        @endauth
                                        <br><br>
                                    @endforeach
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="d-flex justify-content-center">Aucun film trouvé</p>
            @endforelse
        </div>

        <!-- Centered carousel controls -->
        <div id="carouselControls" class="d-flex justify-content-between align-items-center top-0 start-0 w-100 h-100">
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</main>
@endsection
