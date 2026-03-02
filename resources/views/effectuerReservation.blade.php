@extends('layout')

@section('title', 'Page effectuer une réservation')

@section('main')
    <main>
        <h2 class="d-flex justify-content-center pt-3">Effectuer une réservation</h2>
        <h3 class="d-flex justify-content-center pt-5">Séance</h3>
        <div class="row">

            <div class="col-auto d-flex justify-content-center">
                <img src="images/interstellar.jpg" width="170" height="259" alt="test">
            </div>

            <div class="col-auto">
                <h3>Nom du film</h3>
                <p>Nom du cinéma</p>
                <p>Salle</p>
                <p>Date et heure</p>
                <p>Nombre de places restantes</p>
            </div>
        </div>
        <h3 class="pt-4 d-flex justify-content-center">Participants</h3>
        <div class="row d-flex justify-content-center">
            <div class="col-auto">
                <h3>Tarif</h3>
                <select>
                    <option value=""></option>
                </select>
                <button>Ajouter une personne</button>
            </div>
            <div class="col-auto">
                <h3>Prix</h3>
                <p>Price</p>
            </div>
            <div class="col-auto">
                <p>Logo supprimer</p>
            </div>
        </div>


        <div class="pt-5 d-flex justify-content-end">
            <p>Total : price</p>
        </div>

        <div class="d-flex justify-content-end">
            <button>Réserver</button>
        </div>

    </main>
@endsection
