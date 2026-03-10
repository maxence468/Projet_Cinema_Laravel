@extends('layout')

@section('title', 'Page réservation')

@section('main')
    <main>
        <h2 class="d-flex justify-content-center pt-4">Mes réservations</h2>
        @if (session('error'))
            <div class="d-flex justify-content-center alert alert-danger">
                {{session('error')}}
            </div>
        @endif
        <div class="container">

            <div class="pt-5 d-flex justify-content-center">
                <button class="btnChoixVisionReserv"><a href="{{ route('mesReservations', ['filter' => 'a_venir']) }}" class="{{ $filter == 'a_venir' ? 'active' : '' }}">A venir</a></button>
                <button class="btnChoixVisionReserv"><a href="{{ route('mesReservations', ['filter' => 'en_cours']) }}" class="{{ $filter == 'en_cours' ? 'active' : '' }}">En cours</a></button>
                <button class="btnChoixVisionReserv"><a href="{{ route('mesReservations', ['filter' => 'passees']) }}" class="{{ $filter == 'passees' ? 'active' : '' }}">Passées</a></button>
                <button class="btnChoixVisionReserv"><a href="{{ route('mesReservations', ['filter' => 'toutes']) }}" class="{{ $filter == 'toutes' ? 'active' : '' }}">Toutes</a></button>
            </div>

            <div id="carouselExampleCaptions" class="carousel slide">

                <!-- Bouton pour se déplacer dans le carousel en attente de validation
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div> -->
                <div class="carousel-inner">
                    @forelse($reservations as $reservation)

                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">

                            <div class="row mt-4 pt-5 ms-2 d-flex justify-content-center infoReservation">
                                <div class="col-auto">
                                    <img class="imgReserv" src="{{$reservation->seance->film->posterFilm}}" width="170" height="259" alt="{{$reservation->seance->film->posterFilm}}">
                                </div>
                                <div class="col-auto">
                                    <h3 class="ms-2">{{$reservation->seance->film->titreFilm}}</h3>
                                    <p class="ms-2 pt-3">{{$reservation->seance->salle->cinema->nomCinema}}, {{$reservation->seance->salle->cinema->adresseCinema}} {{$reservation->seance->salle->cinema->codePostale}}</p>
                                    <p class="ms-2">{{ \Carbon\Carbon::parse($reservation->seance->dateSeance)->format('d/m/Y') }}
                                        à
                                        {{ \Carbon\Carbon::parse($reservation->seance->heureSeance)->format('H:i') }} </p>
                                    <p class="ms-2">{{$reservation->nbPlace}} personne(s)</p>
                                </div>
                                <div class="col-auto">
                                    <p class="pt-5 mt-5 ms-4">{{$reservation->montantTotal}} €</p>
                                </div>
                                <div class="row pt-5 d-flex justify-content-center btnReservation">
                                    <div class="col-auto ms-2">

                                        <button class="btnOptionMesReserv"><a href="reservations/{{$reservation->idReservation}}/edit">Modifier</a></button>

                                        <form action="{{ route('reservations.destroy', $reservation->idReservation) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btnOptionMesReserv">Annuler</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex justify-content-center">aucune reservation</div>
                    @endforelse


                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </main>
@endsection
