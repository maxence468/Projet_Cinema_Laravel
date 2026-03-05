@extends('layout')

@section('title', 'Page effectuer une réservation')

@section('main')
    <main>
        <h2 class="d-flex justify-content-center pt-3">Effectuer une réservation</h2>

        <div class="contentPageReserv">
            <div class="row pt-5">
                <div class="col-auto">
                    <h3>Séance</h3>
                    <img class="pt-1" src="images/interstellar.jpg" width="170" height="259" alt="test">
                </div>

                <div class="col-auto ps-4 mt-4 pt-3">
                    <h3>Nom du film</h3>
                    <p>Nom du cinéma</p>
                    <p>Salle</p>
                    <p>Date et heure</p>
                    <p>Nombre de places restantes</p>
                </div>
            </div>

            <div class="row">
                <h3 class="pt-4">Participants</h3>
                <div class="col-auto">
                    <h3 class="pt-1">Tarif</h3>
                    <select class="selectTarif pt-1" required>
                        <option value=""></option>
                    </select>
                    <button class="btnAjoutPersReserv mt-4">Ajouter une personne</button>
                </div>

                <div class="col-auto ms-5">
                    <h3>Prix</h3>
                    <h3 class="pt-2">Price</h3>
                </div>
                <div class="col-auto ms-4">
                    <h3></h3>
                    <h3 class="mt-5">Log</h3>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end w-100">
            <div class="d-flex flex-column align-items-center">
                <div class="totalPrice pt-5">
                    <h3 class="text-center mb-3">Total : price</h3>
                </div>

                <button class="btnReserv">Réserver</button>
            </div>
        </div>

    </main>
@endsection
