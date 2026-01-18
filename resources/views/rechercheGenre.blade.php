@extends('layout')

@section('title', 'Page recherche de film par genre')

@section('main')
    <main>
        <form class="pt-2" method="GET" action="{{ route('rechercheGenre') }}">
            <div class="d-flex justify-content-center">
                <select name="movie" class="movie"  onchange="this.form.submit()">
                    <option value="">Rechercher un genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->idGenre }}"
                            {{ request('movie') == $genre->idGenre ? 'selected' : '' }}>
                            {{ $genre->libGenre }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        @if($films->isNotEmpty())
            <h2 class="mt-3">
                Résultat de films pour le genre :
                {{ $films->first()?->genre?->libGenre }}
            </h2>

            <div id="carouselExample" class="carousel slide carousel-3-per-3" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($films as $film)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="carousel-col px-1">
                                <img src="{{ asset('images/' . $film->posterFilm) }}"
                                     class="img-fluid w-100"
                                     alt="{{ $film->titreFilm }}">
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        @else
            @if($films->isEmpty() && request()->filled('movie'))
                <p class="d-flex justify-content-center mt-3">
                    Aucun film trouvé pour ce genre
                </p>
            @endif
        @endif
    </main>
@endsection
