@extends('layout')

@section('title', 'Page recherche de film par genre')

@section('main')
    <style>
        .recherche-genre-poster {
            min-height: 480px;
            height: 480px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #1a1a1a;
            overflow: hidden;
        }
        .recherche-genre-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
        }
        .carousel-3-per-3 .carousel-inner {
            padding: 0.5rem 0;
        }
        .carousel-3-per-3 .carousel-col {
            min-height: 500px;
        }
    </style>
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
                            <div class="row g-2 justify-content-center">
                                    <div class="col-4 col-md-4 carousel-col px-3">
                                        <div class="recherche-genre-poster">
                                            @if(File::exists(public_path('images/' . $film->posterFilm)))
                                                <img src="{{ asset('images/' . ($film->posterFilm ?? 'img.png')) }}"
                                                     class="recherche-genre-img"
                                                     alt="">
                                            @else

                                                <html>
                                                <img src="{{ asset('images/img.png')}}"
                                                     alt=""
                                                     class="recherche-genre-img">
                                                </html>

                                            @endif


                                        </div>
                                        <p class="small text-center mt-1 mb-0">{{ $film->titreFilm }}</p>
                                    </div>
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
