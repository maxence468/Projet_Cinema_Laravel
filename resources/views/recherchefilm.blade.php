@extends('header')

@section('title', 'Page recherche de film')

@section('main')

    <main class="mainRechFilm">
        <form class="pt-2" method="GET" action="{{ route('recherchefilm') }}" onsubmit="showResult()">
            @csrf
            <div class="d-flex justify-content-center">
                <input class="inputRechFilm" type="text" name="search" placeholder="Rechercher un film"
                       value="{{ $search ?? '' }}">
                <input id="searchInput" type="submit" hidden/>
            </div>
        </form>

        <br>

        <div id="carouselExample" class="carousel slide position-relative" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($films as $film)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <h2 id="msgResult" hidden>
                            Résultats de film pour : {{$film->titreFilm}}
                        </h2>
                        <div class="row align-items-start">
                            <div class="col-auto">
                                <img src="{{ asset('images/' . $film->posterFilm) }}"
                                     width="412"
                                     height="626"
                                     alt="{{ $film->titreFilm }}">
                            </div>

                            <div class="col">
                                <p>Titre : {{$film->titreFilm}}</p>
                                <p>Description : {{$film->descFilm}}</p>
                                <p>Genre : {{$film->genre->libGenre}}</p>
                                @foreach($film->realisateurs as $b)
                                    <p>Réalisateurs : {{$b->nomPers}} {{$b->prePers}}</p>
                                @endforeach
                                <p>Durée : {{$film->dureeFilm}} minutes</p>
                                @foreach($film->seances as $ss)
                                    <p>Disponible au cinema : {{$ss->dateSeance}} ({{$ss->salle->cinema->nomCinema}}) {{$ss->heureSeance}} heures</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="d-flex justify-content-center">Aucun film trouvé</p>
                @endforelse
            </div>

            <!-- Centered carousel controls -->
            <div id="carouselControls" class="d-flex justify-content-between align-items-center position-absolute top-0 start-0 w-100 h-100">
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </main>

    <script>
        function showResult() {
            const msgResult = document.getElementById('msgResult');
            if(msgResult) msgResult.hidden = false;

            // Hide carousel controls
            const carouselControls = document.getElementById('carouselControls');
            if(carouselControls) carouselControls.style.display = 'none';

            return false; // Prevent actual form submission (optional)
        }

        // Optional: trigger showResult on form submit
        const form = document.querySelector('form');
        form.addEventListener('submit', showResult);
    </script>

@endsection
