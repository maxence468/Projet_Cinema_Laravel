@extends('layout')

@section('title', 'Page modifier une réservation')

@section('main')
    <main id="pageModifierReservation">
        <h2 class="d-flex justify-content-center pt-3">Modifier une réservation</h2>

        <div class="contentPageReserv">
            <div class="row pt-5">
                <div class="col-auto">
                    <h3>Séance</h3>
                    <img class="pt-1" src="{{$seance->film->posterFilm}}" width="170" height="259" alt="{{$seance->film->posterFilm}}">
                </div>

                <div class="col-auto ps-4 mt-4 pt-3">
                    <h3>{{$seance->film->titreFilm}}</h3>
                    <p>{{$seance->salle->cinema->nomCinema}}, {{$seance->salle->cinema->adresseCinema}} {{$seance->salle->cinema->codePostale}}</p>
                    <p>Numero de salle : {{$seance->salle->numeroSalle}}</p>
                    <p>{{$seance->heureSeance}}</p>
                    <p>{{$placeRestant}} places restantes</p>
                </div>
            </div>


            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf
                <input type="hidden" name="idSeance" value="{{ $seance->idSeance }}">

                <div class="row">
                    <h3 class="pt-4">Participants</h3>

                    <div class="col-auto colAutoRemove">
                        <h3 class="pt-1">Tarif</h3>

                        <div id="divIdChampsSelect" class="participant-stack">
                            <div class="participant-slot">
                                <select name="tarifs[]" class="selectTarif" required>
                                    <option value=""></option>
                                    @foreach($tarifs as $tarif)
                                        <option class="optionTarif" value="{{$seance->salle->typeSalle->prixTypeSalle + $tarif->prixTarif}}">{{$tarif->libTarif}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="button" class="btnAjoutPersReserv mt-4">
                            Ajouter une personne
                        </button>
                    </div>

                    <div class="col-auto">
                        <h3>Prix</h3>

                        <div id="divIdPrixTarif" class="participant-stack">
                            <div class="participant-slot participant-text">
                                <h3 class="prixParTarif">0 €</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-auto btnSuppr">
                        <div id="divIdBtnSuppr" class="participant-stack">
                            <div class="participant-slot">
                                <button type="button" class="btnSupprParticipant">
                                    <h3><i class="bi bi-trash"></i></h3>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="d-flex w-100 reserverSmallScreen">
            <div class="d-flex flex-column align-items-center">
                <div class="totalPrice pt-5">
                    <h3 id='prixTotal' class="text-center mb-3">Total : 0 €</h3>
                </div>

                <button class="btnReserv">Réserver</button>
            </div>
        </div>
    </main>

    <template id="tplTarifParticipant">
        <div class="participant-slot">
            <select name="tarifs[]" class="selectTarif" required>
                <option value=""></option>
                @foreach($tarifs as $tarif)
                    <option class="optionTarif" value="{{$seance->salle->typeSalle->prixTypeSalle + $tarif->prixTarif}}">{{$tarif->libTarif}}</option>
                @endforeach
            </select>
        </div>
    </template>

    <template id="tplPrixParticipant">
        <div class="participant-slot participant-text">
            <h3 class="prixParTarif">0 €</h3>
        </div>
    </template>

    <template id="tplSupprChamp">
        <div class="participant-slot">
            <button type="button" class="btnSupprParticipant">
                <h3><i class="bi bi-trash"></i></h3>
            </button>
        </div>
    </template>
@endsection
