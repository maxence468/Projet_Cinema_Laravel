<?php
use App\Http\Controllers\SeanceController;
?>

@extends('header')

@section('title', 'Page d\'accueil')

@section('main')
<main class="pt-5">
    <h2 class="pt-5 ps-2 pb-2">Les dernières sorties</h2>
    <div class="d-flex flex-row justify-content-evenly">
        @foreach($films as $film)
            <img src="{{ asset('images/' . $film->posterFilm) }}"
                 alt="{{ $film->titreFilm }}"
                 class="poster">
        @endforeach
    </div>
</main>
@endsection

