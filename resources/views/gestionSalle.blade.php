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
                        <div class="row mb-1">
                            <div class="col-12 col-lg-7 order-1">
                                <h3 class="mb-3 pt-4 pb-4">Ajouter, modifier ou supprimer une salle</h3>
                            </div>

                            <div class="col-12 col-lg-5 order-2 d-lg-flex justify-content-center mt-5">
                                <div class="alignment-wrapper mt-4">
                                    <label class="h3" for="listeSalle">Salle à modifier</label>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4 pt-3">
                            <div class="col-12 col-lg-3 order-4 order-lg-3">
                                <label class="h3 mb-0">Cinéma</label>
                            </div>

                            <div class="col-12 col-lg-4 order-5 order-lg-4">
                                <select id="idCinema" name="cinema" class="choixCatal" required>
                                    <option value="">Cinéma</option>
                                    @foreach($cinemas as $cinema)
                                        <option value="{{$cinema->idCinema}}">{{$cinema->nomCinema}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-lg-5 order-3 order-lg-5 d-lg-flex justify-content-center pt-2 pt-lg-0">
                                <div class="alignment-wrapper">
                                    <select id="salleModif" name="movie" class="choixCatal" onchange="">
                                        <option value=""></option>
                                        @foreach($salles as $salle)
                                            <option value="{{$salle->idSalle}}">{{$salle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Type de salle</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <select id="idTypeSalle" name="typeSalle" class="choixCatal" required>
                                    <option value="">Type de salle</option>
                                    @foreach($typeSalles as $typeSalle)
                                        <option value="{{$typeSalle->idTypeSalle}}">{{$typeSalle->libTypeSalle}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-5 d-none d-lg-block"></div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Numéro de salle</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input id="numeroSalle" class="inputCatalogue" type="number" min="1" max="1000" step="1"
                                       title="La numéro de la salle doit être entre 1 et 1000" placeholder="Numéro de salle" required>
                            </div>
                            <div class="col-lg-5 d-none d-lg-block"></div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Capacité salle</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input id="capaciteSal" class="inputCatalogue" type="number" min="1" max="1000" step="1"
                                       title="La capacité de la salle doit être entre 1 et 1000" placeholder="Capacité salle" required>
                            </div>
                            <div class="col-lg-5 d-none d-lg-block"></div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Tarif</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <select id="idTarif" name="tarif" class="choixCatal" required>
                                    <option value="">Tarif</option>
                                    @foreach($tarifs as $tarif)
                                        <option value="{{$tarif->idTarif}}">{{$tarif->libTarif}} : {{$tarif->prixTarif}} €</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-5 d-none d-lg-block"></div>
                        </div>
                        <div>

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
        <template id="tplFormTarif">
            <form id="myForm" method="post" action="">
                @csrf
                <div class="row align-items-center mb-1">
                    <div class="col-12 col-lg-7 order-1 pt-4 pb-4">
                        <h3 class="mb-3">Ajouter, modifier ou supprimer un tarif</h3>
                    </div>
                    <div class="col-12 col-lg-5 order-2 d-lg-flex justify-content-center">
                        <div class="alignment-wrapper">
                            <label class="h3 mb-3 labelFilm pt-5" for="listeFilm">Tarif à modifier</label>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center mb-4">
                    <div class="col-12 col-lg-3 order-4 order-lg-3">
                        <label class="h3 mb-0">Libelle tarif</label>
                    </div>

                    <div class="col-12 col-lg-4 order-5 order-lg-4">
                        <input class="inputCatalogue" type="text" placeholder="Libelle tarif" required>
                    </div>

                    <div class="col-12 col-lg-5 order-3 order-lg-5 d-lg-flex justify-content-center pt-2 pt-lg-0">
                        <div class="alignment-wrapper">
                            <select name="movie" class="choixCatal" onchange="this.form.submit()">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center mb-4">
                    <div class="col-12 col-lg-3">
                        <label class="h3 mb-0">Prix tarif</label>
                    </div>
                    <div class="col-12 col-lg-4">
                        <input class="inputCatalogue" type="text" placeholder="Prix tarif" required>
                    </div>
                </div>
            </form>
        </template>
    </main>
    @vite('resources/js/stateButtons.js')
    @vite('resources/js/gestionSalle.js')
    @vite('resources/js/updateSelect.js')
@endsection
