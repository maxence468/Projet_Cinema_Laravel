@extends('layout')

@section('title', 'Page gestion personne')

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
                            <div class="col-12 col-lg-7 order-1 pb-5 pt-4">
                                <h3 class="mb-3">Ajouter, modifier ou supprimer une personne</h3>
                            </div>

                            <div class="col-12 col-lg-5 order-2 d-lg-flex justify-content-center pt-5">
                                <div class="alignment-wrapper">
                                    <label class="h3 mb-3 labelFilm" for="listeFilm">Personne à modifier</label>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3 order-4 order-lg-3">
                                <label class="h3 mb-0">Nom personne</label>
                            </div>

                            <div class="col-12 col-lg-4 order-5 order-lg-4">
                                <input class="inputCatalogue" id="nomPers" name="nomPers" type="text" placeholder="Nom personne" required>
                            </div>

                            <div class="col-12 col-lg-5 order-3 order-lg-5 d-lg-flex justify-content-center pt-2 pt-lg-0">
                                <div class="alignment-wrapper">
                                    <select id="personneModif" name="personneModif" class="choixCatal">
                                        <option value="">Personne à modifier</option>
                                        @foreach($personnes as $p)
                                            <option value="{{$p->idPers}}">{{$p->nomPers}} {{$p->prePers}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Prenom personne</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input class="inputCatalogue" id="prePers" name="prePers" type="text" placeholder="Prenom personne" required>
                            </div>
                            <div class="col-lg-5 d-none d-lg-block"></div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Date de naissance</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input class="inputCatalogue" id="dateNaissPers" name="dateNaissPers" type="text" placeholder="Date de naissance" required>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Lieu de naissance</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input class="inputCatalogue" id="lieuNaissPers" name="lieuNaissPers" type="text" placeholder="Lieu de naissance" required>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Photo personne</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input class="inputCatalogue" id="photoPers" name="photoPers" type="text" placeholder="Photo personne" required>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Bibliographie</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <textarea class="textareaCatalogue" id="biblio" name="biblio" placeholder="Bibliographie" required></textarea>
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
    @vite('resources/js/gestionPersonne.js')
@endsection
