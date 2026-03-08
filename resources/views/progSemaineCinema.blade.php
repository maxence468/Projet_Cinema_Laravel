@php
    use Illuminate\Support\Carbon;
@endphp

@extends('layout')

@section('title', 'Page programme de la semaine')

@section('main')
<main>
    <div class="d-flex justify-content-center">
        {{--Selection d'un cinema dans une liste deroulante--}}
        <form class="pt-2" method="GET" action="{{ route('progSemaineCinema') }}">
            <select name="cinema" onchange="this.form.submit()">
                <option value="">Rechercher un cinéma</option>
                @foreach ($cinemas as $cinema)
                    <option value="{{ $cinema->idCinema }}"
                        {{ request('cinema') == $cinema->idCinema ? 'selected' : '' }}>
                        {{ $cinema->nomCinema }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    {{--Quand un cinema est choisi--}}
    @if($cinemaChoisi->isNotEmpty())
        <h2 class="mt-3">Résultat pour le cinéma :
            {{ $cinemaChoisi->first()->nomCinema }}
        </h2>
        <div class="col-auto d-flex justify-content-around affichageBtnPageProgSemaine">
            {{-- on affiche 7 bouton pour chaque jours de la semaine --}}
            @for ($i = 0; $i <7; $i++)
                <a class="btnChoixJour" href="{{ request()->fullUrlWithQuery(['jour' => $jours[$i] ])}}">{{$days[$i]}}</a>
            @endfor
        </div>
    @endif

    @if(request()->has('jour'))
        <!-- Renvoi de l'affiche avec le titre, le genre et la durée -->
        @if($films->isNotEmpty())
            @foreach($films as $film)
                <div class="row d-flex align-items-center affichageFilmPageProgSemaine">
                    <div class="col-auto">
                        <form method="GET" action="{{ route('recherchefilm') }}">
                            <input type="hidden" value="{{ $film->titreFilm }}">
                            <button type="submit">

                                @if(File::exists(public_path('images/' . $film->posterFilm)))
                                    <img src="{{asset('images/' .$film->posterFilm)}}" alt="{{$film->posterFilm}}" width="100" height="152">

                                @else
                                    <img src="{{ asset('images/img.png')}}"
                                         width="100" height="152"
                                         alt="">

                                @endif

                            </button>
                        </form>
                    </div>
                    <div class="col-auto">
                        <p>{{$film->titreFilm}}</p>
                        <p>{{$film->genre->libGenre}} ({{$film->dureeFilm}} min)</p>
                    </div>
                </div>

                <div class="row affichageSeancePageProgSemaine">
                    @foreach($seances as $seance)
                        @if($seance->idFilm == $film->idFilm )
                            <!-- Renvoi de toutes les séances de la journée choisie -->
                            <div class="col-auto me-5">
                                <h4>{{$seance->heureSeance->format('H:i')}} -> {{$seance->heureSeance->addMinutes($seance->film->dureeFilm)->format('H:i')}}</h4>
                                <h4 class="affichageSalleProgSemaine">Salle {{$seance->idSalle}}</h4>
                                <h4><a href="/effectuerReservation" class="btnReservProgSemaineCinema">Réserver</a></h4>
                            </div>

                        @endif
                    @endforeach
                </div>
            @endforeach
        @else
            <p class="d-flex justify-content-center mt-3">Aucun film pour ce jour</p>
        @endif
    @endif
</main>
@endsection
