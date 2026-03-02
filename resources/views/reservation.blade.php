@extends('layout')

@section('title', 'Page réservation')

@section('main')
    <main>
        <h2 class="d-flex justify-content-center pt-4">Mes réservations</h2>

        <div class="container">

            <div class="pt-5 d-flex justify-content-center">
                <button class="btnChoixVisionReserv">A venir</button>
                <button class="btnChoixVisionReserv">En cours</button>
                <button class="btnChoixVisionReserv">Passées</button>
                <button class="btnChoixVisionReserv">Toutes</button>
            </div>

            <div class="row mt-4 pt-5 ms-3 d-flex justify-content-center infoReservation">

                <div class="col-auto">
                    <img src="images/interstellar.jpg" width="170" height="259" alt="test">
                </div>
                <div class="col-auto">
                    <h3 class="ms-2">Nom du film</h3>
                    <p class="ms-2 pt-3">Cinéma et adresse</p>
                    <p class="ms-2">Date et heure</p>
                    <p class="ms-2">Nombre de personnes</p>
                </div>
                <div class="col-auto">
                    <p class="pt-5 mt-5 ms-4">Prix</p>
                </div>

            </div>

            <div class="row pt-5 d-flex justify-content-center btnReservation">
                <div class="col-auto ms-2">
                    <button class="btnOptionMesReserv">Modifier</button>
                    <button class="btnOptionMesReserv">Annuler</button>
                </div>
            </div>



        </div>
    </main>
@endsection
