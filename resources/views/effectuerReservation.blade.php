@extends('layout')

@section('title', 'Page effectuer une réservation')

@section('main')
    <main>
        <h2>Effectuer une réservation</h2>
        <h3>Séance</h3>
        <div>
            <img>
            <h3>Nom du film</h3>
            <p>Nom du cinéma</p>
            <p>Salle</p>
            <p>Date et heure</p>
            <p>Nombre de places restantes</p>
        </div>
        <div>
            <h3>Participants</h3>
            <div>
                <h3>Tarif</h3>
                <h3>Prix</h3>
            </div>
            <div>
                <select>
                    <option value=""></option>
                    @foreach('')
                        <option value=""></option>
                    @endforeach
                </select>
                <p>Prix</p>
                <p>Logo supprimer</p>
            </div>
            <div>
                <button>Ajouter une personne</button>
            </div>
            <div>
                <p>Total : </p>
                <button>Réserver</button>
            </div>
        </div>
    </main>
@endsection
