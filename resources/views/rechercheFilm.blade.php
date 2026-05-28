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
        <div id="carouselExample" class="carousel slide position-relative">
            <div class="carousel-inner">
                <h2 class="ps-3">Résultat de films pour : {{ $search ?? '' }}</h2>
                @forelse($films as $film)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="row align-items-start">
                            <div class="col-auto">
                                <img src="{{ $film->posterFilm ?? asset('images/img.png') }}"
                                     alt="{{ $film->titreFilm }}"
                                     class="smd ps-2" width="412px" height="626px"
                                     onerror="this.onerror=null;this.src='{{ asset('images/img.png') }}';">
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

                                @for($i < 0; $i < $film->note->pivot->note; $i++)
                                    {{$noteTotal += $film->note->pivot->note;}}
                                @endfor


                                @auth
                                    @if(Auth::user())
                                        <p>Quelle note voulez vous mettre ?</p>
                                        <form method="GET" action="{{ route('noterFilm') }}">

                                            <input type="hidden" name="film" value="{{$film->idFilm}}">
                                            <fieldset class="rating">
                                                <input type="radio" id="star5" name="rating" value="5" />
                                                <label for="star5">5 stars</label>
                                                <input type="radio" id="star4" name="rating" value="4" />
                                                <label for="star4">4 stars</label>
                                                <input type="radio" id="star3" name="rating" value="3" />
                                                <label for="star3">3 stars</label>
                                                <input type="radio" id="star2" name="rating" value="2" />
                                                <label for="star2">2 stars</label>
                                                <input type="radio" id="star1" name="rating" value="1" />
                                                <label for="star1">1 star</label>
                                            </fieldset>

                                        </form>

                                        <br>
                                        <br>
                                    @endif()
                                @endauth
                                @if($film->seances->isEmpty())
                                    <p>Aucune séance disponible</p>
                                @elseif(Carbon::parse($film->seances[0]->dateSeance)->lt(Carbon::today()))
                                    <p>Aucune seance disponible</p>
                                @else
                                    <p class="pt-3">Disponible au cinema : <br><br>
                                        <?php $date = date('Y:m:d') ?>
                                        @foreach($film->seances as $s)
                                            @if($s->dateSeance->lt(Carbon::today()))
                                            @else
                                                le {{$s->dateSeance->format('d/m/Y')}} à {{$s->heureSeance->format('H:i')}} au cinéma {{ $s->salle->cinema->nomCinema }}

                                            @endif
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('input[type=radio][name="rating"]').on('change', function() {
                $(this).closest('form').submit();
            });
        });
    </script>
@endpush
