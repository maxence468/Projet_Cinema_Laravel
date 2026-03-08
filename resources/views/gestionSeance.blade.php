@extends('layout')

@section('title', 'Page gestion seance')

@section('main')
    <main class="container-fluid pt-3">
        <div class="d-flex flex-row align-items-start">

            <div class="d-flex flex-column pt-4 ps-2 sidebar">
                <a href="/gestionFilm" class="nav-text">Gestion film</a>
                <a href="/gestionGenre" class="nav-text pt-3">Gestion genre</a>
                <a href="/gestionPersonne" class="nav-text pt-3">Gestion personne</a>
                <a href="/gestionCasting" class="nav-text pt-3">Gestion casting</a>
                <a href="/gestionCinema" class="nav-text pt-3">Gestion cinéma</a>
                <a href="/gestionSalle" class="nav-text pt-3">Gestion salle</a>
                <a href="/gestionSeance" class="nav-text pt-3">Gestion séance</a>
                <a href="/gestionTarif" class="nav-text pt-3">Gestion tarif</a>
                <a href="/gestionTypeSalle" class="nav-text pt-3">Gestion typeSalle</a>
                <a href="/gestionTarifSalle" class="nav-text pt-3">Gestion tarif salle</a>
            </div>

            <div class="espaceSideBar flex-grow-1">
                <div class="container-fluid">

                    <form id="myForm" method="post" action="">
                        @csrf
                        <div class="row align-items-center mb-1">
                            <div class="col-12 col-lg-7 order-1 pt-1 pb-5">
                                <h3 class="mb-3">Ajouter, modifier ou supprimer une séance</h3>
                            </div>

                            <div class="col-12 col-lg-5 order-2 d-lg-flex justify-content-center">
                                <div class="alignment-wrapper pt-5">
                                    <label class="h3 mb-3 labelFilm" for="listeFilm">Séance à modifier</label>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3 order-4 order-lg-3">
                                <label class="h3 mb-0">Heure séance</label>
                            </div>

                            <div class="col-12 col-lg-4 order-5 order-lg-4">
                                <input class="inputCatalogue" id="heureSeance" name="heureSeance" type="time" placeholder="Heure (HH:MM)" required>
                            </div>

                            <div class="col-12 col-lg-5 order-3 order-lg-5 d-lg-flex justify-content-center pt-2 pt-lg-0">
                                <div class="alignment-wrapper">
                                    <select id="seanceModif" name="seanceModif" class="choixCatal">
                                        <option value="">Séance à modifier</option>
                                        @foreach($seances as $s)
                                            <option value="{{ $s->idSeance }}">Séance #{{ $s->idSeance }} - {{ $s->dateSeance }} {{ $s->heureSeance }} - Film {{ $s->idFilm }} - Salle {{ $s->idSalle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Date séance</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input class="inputCatalogue" id="dateSeance" name="dateSeance" type="date" placeholder="Date séance" required>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Durée séance (min)</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input class="inputCatalogue" id="dureeSeance" name="dureeSeance" type="number" placeholder="Durée en minutes" required>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Film</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <select class="inputCatalogue choixCatal" id="idFilm" name="idFilm" required>
                                    <option value="">Choisir un film</option>
                                    @foreach($films as $f)
                                        <option value="{{ $f->idFilm }}">{{ $f->titreFilm }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Salle</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <select class="inputCatalogue choixCatal" id="idSalle" name="idSalle" required>
                                    <option value="">Choisir une salle</option>
                                    @foreach($salles as $s)
                                        <option value="{{ $s->idSalle }}">Salle {{ $s->idSalle }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap justify-content-center justify-content-lg-end pt-5 pb-5">
            <button id="btnAjt" form="myForm" name="btnAjout" class="btn-ajoutModifSuppr" type="button"><span>Ajouter</span></button>
            <button id="btnModif" form="myForm" name="btnModif" class="btn-ajoutModifSuppr" type="button"><span>Modifier</span></button>
            <button id="btnSuppr" form="myForm" name="btnSuppr" class="btn-ajoutModifSuppr" type="button"><span>Supprimer</span></button>
        </div>
    </main>
    @vite('resources/js/gestionSeance.js')
@endsection
