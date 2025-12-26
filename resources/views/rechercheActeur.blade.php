<?php
$message_result = "Résultat pour l'acteur";
?>

@extends('header')

@section('title', 'Page de recherche d\'acteur')

@section('main')
<main class="mainRechFilm">
    <form method="GET" action="{{ route('rechercheActeur') }}">
        @csrf
        <div class="d-flex justify-content-center">
            <input class="inputRechFilm" type="text" name="searchActeur" placeholder="Rechercher un acteur" value="{{ $search ?? '' }}">
            <input type="submit" hidden/>
        </div>
    </form>
    <br>
    <div class="toHide">
        @foreach($personnes as $p)
            <h2 hidden><?php echo $message_result ?> {{$p->nomPers}}</h2>
            <div class="row">
                <div class="col">
                    <img src="{{asset('images/' .$p->photoPers)}}" alt="{{$p->photoPers}}" width="412" height="626">
                </div>
                <div class="col" style="margin-right: 360px">
                    <p>{{$p->nomPers}}</p>
                    <p>{{$p->prePers}}</p>
                    <p>{{$p->dateNaissPers}}</p>
                    <p>{{$p->lieuNaissPers}}</p>
                    <p>{{$p->biblio}}</p>
                </div>
                @endforeach
                @foreach($p->films as $f)
                @endforeach
            </div>
    </div>
</main>
@endsection
