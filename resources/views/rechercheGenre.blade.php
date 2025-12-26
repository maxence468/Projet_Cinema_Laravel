@extends('header')

@section('title', 'Page recherche de film par genre')

@section('main')
<form method="GET" action="{{ route('rechercheGenre') }}">
    @csrf
    <div class="d-flex justify-content-center">
        <select name="movie" class="movie">
            <option value="">Rechercher un genre</option>
            @foreach ($genres as $genre)
                <option value="{{ $genre->idGenre }}"
                    {{ request('movie') == $genre->idGenre ? 'selected' : '' }}>
                    {{ $genre->libGenre }}
                </option>
            @endforeach
        </select>
        <button type="submit">Rechercher</button>
    </div>
</form>

@if($films->isNotEmpty())
    <h2>
        Résultats de film pour le genre :
        {{ $films->first()?->genre?->libGenre }}
    </h2>

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($films as $film)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="carousel-col">
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

    <script>
        document.querySelectorAll('.carousel .carousel-item').forEach((el) => {
            const minPerSlide = 3;
            let next = el.nextElementSibling;

            for (let i = 1; i < minPerSlide; i++) {
                if (!next) {
                    next = el.parentNode.firstElementChild;
                }
                const clone = next.children[0].cloneNode(true);
                el.appendChild(clone);
                next = next.nextElementSibling;
            }
        });
    </script>


@else
    <p class="d-flex justify-content-center">Aucun film trouvé pour ce genre</p>
@endif
@endsection
