@php
    use App\Http\Controllers\SeanceController;
@endphp

@extends('layout')

@section('title', 'Page d\'accueil')

@section('main')
<main class="pt-5">
    <h2 class="pt-5 ps-2 pb-2">Les dernières sorties</h2>
    <div class="d-flex flex-row justify-content-evenly">
        @foreach($films as $film)
            <form method="GET" action="{{ route('recherchefilm') }}">
                <input type="hidden" value="{{ $film->titreFilm }}" name="search">
                <button type="submit">

                    @if($film->posterFilm)
                        <img src="{{ asset('images/avatar.jpg')}}"
                             alt="{{ $film->titreFilm }}"
                             class="poster">


                    @else
                        <img src="{{ asset('images/img.png')}}"
                             alt="{{ $film->titreFilm }}"
                             class="poster">
                    @endif

                </button>
            </form>
        @endforeach
    </div>
</main>
@endsection

