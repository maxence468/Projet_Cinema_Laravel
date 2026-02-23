@extends('layout')

@section('title', 'Page gestion film')

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

            <div class="espaceSideBar flex-grow-1 pt-4">

                <div class="container-fluid">

                    <form id="myForm">
                        @csrf
                        <div class="row align-items-center mb-1">
                            <div class="col-12 col-lg-7 order-1">
                                <h3 class="mb-3">Ajouter, modifier ou supprimer un film</h3>
                            </div>

                            <div class="col-12 col-lg-5 order-2 d-lg-flex justify-content-center">
                                <div class="alignment-wrapper">
                                    <label class="h3 mb-3 labelFilm" for="listeFilm">Film à modifier</label>
                                </div>


                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3 order-4 order-lg-3">
                                <label class="h3 mb-0">Titre film</label>
                            </div>

                            <div class="col-12 col-lg-4 order-5 order-lg-4">
                                <input class="inputCatalogue" id="titreFilm" type="text" placeholder="Titre film" required>
                            </div>

                            <div class="col-12 col-lg-5 order-3 order-lg-5 d-lg-flex justify-content-center pt-2 pt-lg-0">
                                <div class="alignment-wrapper">
                                    <select name="movie" class="choixCatal" onchange="" id="filmModif">
                                        <option value=""></option>
                                        @foreach($films as $film)
                                            <option value="{{$film->idFilm}}">{{$film->titreFilm}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-start mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Description film</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <textarea class="textareaCatalogue" id="descFilm" placeholder="Description film" required></textarea>
                            </div>
                            <div class="col-lg-5 d-none d-lg-block"></div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Date de sortie film</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input class="inputCatalogue" id="dateSortieFilm" type="date" placeholder="Date de sortie film" required>
                            </div>

                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Durée film</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input class="inputCatalogue" id="dureeFilm" type="number" placeholder="Durée film" required>
                            </div>

                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Poster film</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input class="inputCatalogue" id="posterFilm" type="text" placeholder="Poster film" required>
                            </div>

                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Genre film</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <select name="genre" class="choixCatal" id="idGenre">
                                    <option value="">Genre film</option>
                                    @foreach($genres as $genre)
                                        <option value="{{$genre->idGenre}}">{{$genre->libGenre}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Réalisateur film</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input class="inputCatalogue" type="text" placeholder="Réalisateur film" required>
                            </div>

                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Scénariste film</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input class="inputCatalogue" type="text" placeholder="Scénariste film" required>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap justify-content-center justify-content-lg-end pt-5 pb-5">
            <button name="btnAjout" class="btn-ajoutModifSuppr" id="btnAjt"><span>Ajouter</span></button>
            <button name="btnModif" class="btn-ajoutModifSuppr" id="btnModif" ><span>Modifier</span></button>
            <button name="btnSuppr" class="btn-ajoutModifSuppr" id="btnSuppr"><span>Supprimer</span></button>

        </div>
    </main>
    @vite('resources/js/gestionFilm.js')
@endsection
