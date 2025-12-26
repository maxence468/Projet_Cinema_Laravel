<?php
use Illuminate\Support\Carbon;

?>

@extends('header')

@section('title', 'Page programme de la semaine')

@section('main')
<div class="d-flex justify-content-center">
    {{--Selection d'un cinema dans une liste deroulante--}}
    <form method="GET" action="{{ route('progSemaineCinema') }}">
        @csrf
        <select name="cinema">
            <option value="">Rechercher un cinéma</option>
            @foreach ($cinemas as $cinema)
                <option value="{{ $cinema->idCinema }}"
                    {{ request('cinema') == $cinema->idCinema ? 'selected' : '' }}>
                    {{ $cinema->nomCinema }}
                </option>
            @endforeach
        </select>
        <button type="submit">Rechercher</button>
    </form>
</div>
{{--Quand un cinema est choisi--}}
@if($cinemaChoisi->isNotEmpty())
    <div class="col d-flex justify-content-around" style="margin-top: 60px">
        {{-- on affiche 7 bouton pour chaque jours de la semaine --}}
        @for ($i = 0; $i <7; $i++)
            <button class="btnChoixJour">
                <a href="{{ request()->fullUrlWithQuery(['jour' => $jour + $i ])}}">{{$joursSemaine[$i]}} {{$jour + $i}} {{$mois}}</a>
            </button>
        @endfor
    </div>
@endif

{{--quand un jour est choisi--}}
@if(request()->has('jour'))
    @if($seances->isNotEmpty())
        ??
        @foreach($seances as $seance)
            <hr>
            <img src="{{asset($seance->film->posterFilm)}}" alt="{{$seance->film->posterFilm}}">
            <p>Titre film : {{$seance->film->titreFilm}} </p>
            <p>genre : {{$seance->film->genre->libGenre}}</p>
            <p>durée : {{$seance->film->dureeFilm}}</p>
            <p>numero de la salle : {{$seance->idSalle}} </p>
            <p>heure debut seance : {{$seance->heureSeance}}</p>
            <p>heure fin seance : {{Carbon::createFromFormat('H:i', $seance->heureSeance)->addMinutes($seance->film->dureeFilm)->format('H:i')}}</p>
            <hr>
        @endforeach
    @else
        <p class="d-flex justify-content-center">Aucun film pour ce jour</p>
    @endif
@endif
@endsection
