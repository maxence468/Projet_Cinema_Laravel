@extends('layout')

@section('title', 'Page gestion film')

@section('main')
    <main class="container-fluid pt-3">
        <div class="d-flex flex-row align-items-start">

            <div class="d-flex flex-column pt-4 ps-2 sidebar">
                <a href="/gestionFilm" class="nav-text">Gestion film</a>
                <a href="/gestionGenre" class="nav-text pt-3">Gestion genre</a>
                <a href="/gestionPersonne" class="nav-text pt-3">Gestion personne</a>
                <a href="/gestionCinema" class="nav-text pt-3">Gestion cinéma</a>
                <a href="/gestionSalle" class="nav-text pt-3">Gestion salle</a>
                <a href="/gestionSeance" class="nav-text pt-3">Gestion séance</a>
                <a href="/gestionTarif" class="nav-text pt-3">Gestion tarif</a>
                <a href="/gestionTypeSalle" class="nav-text pt-3">Gestion typeSalle</a>
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
                                <input id="heureSeance" class="inputCatalogue" type="time" placeholder="Heure séance" required>
                            </div>

                            <div class="col-12 col-lg-5 order-3 order-lg-5 d-lg-flex justify-content-center pt-2 pt-lg-0">
                                <div class="alignment-wrapper">
                                    <select id="seanceModif" name="movie" class="choixCatal">
                                        <option value=""></option>
                                        @foreach($seances as $seance)
                                            <option value="{{$seance->idSeance}}">Seance du {{$seance->dateSeance->format('d/m/Y')}} pour le film {{$seance->film->titreFilm}} à {{$seance->heureSeance->format('H:i')}} pour le cinema {{$seance->salle->cinema->nomCinema}}</option>
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
                                <input id="dateSeance" class="inputCatalogue" type="date" placeholder="Date séance" required>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Durée séance</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input id="dureeSeance" class="inputCatalogue" type="number" placeholder="Durée séance" required>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Titre film</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <select id="idFilm" class="choixCatal" onchange="">
                                    <option value="">Titre film</option>
                                    @foreach($films as $film)
                                        <option value="{{$film->idFilm}}">{{$film->titreFilm}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Numéro de salle</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <select id="idSalle" class="choixCatal" onchange="">
                                    <option value="">Numéro de salle</option>
                                    @foreach($salles as $salle)
                                        <option value="{{$salle->idSalle}}">{{$salle->idSalle}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap justify-content-center justify-content-lg-end pt-5 pb-5">
            <button name="btnAjout" class="btn-ajoutModifSuppr" id="btnAjt"><span>Ajouter</span></button>
            <button name="btnModif" class="btn-ajoutModifSuppr" id="btnModif"><span>Modifier</span></button>
            <button name="btnSuppr" class="btn-ajoutModifSuppr" id="btnSuppr"><span>Supprimer</span></button>
        </div>
    </main>
    @vite('resources/js/stateButtons.js')
    @vite('resources/js/gestionSeance.js')
    @vite('resources/js/updateSelect.js')
@endsection
