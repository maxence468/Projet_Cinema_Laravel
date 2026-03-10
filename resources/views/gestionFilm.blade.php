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
                                <input class="inputCatalogue" id="titreFilm" type="text" pattern="^[A-Za-zÀ-ÿ0-9'’\-\s.,:!?()]{2,100}$" placeholder="Titre film" required>
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
                                <input class="inputCatalogue" id="dureeFilm" type="number" min="30" max="300" step="1" placeholder="Durée film" required>
                            </div>

                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0">Poster film</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input class="inputCatalogue" id="posterFilm" type="text" pattern="^https?:\/\/.+\.(jpg|jpeg|png|webp|gif)$" placeholder="Poster film" required>
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
                                <button type="button" id="btnAjoutFormGenre" name="btnAjoutFormGenre" class="btnAjoutFormGenre" onclick="showFormGenre()">Créer un genre</button>
                            </div>
                        </div>

                        <div id="divIdGenre">
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0 pb-5">Réalisateur film</label>
                            </div>
                            <div class="col-12 col-lg-4" id="realisateurs-container">
                                <select name="idRealisateur[]" class="inputCatalogue choixCatal idRealisateur">
                                    <option value="">Réalisateur film</option>
                                    @foreach($personnes as $personne)
                                        <option value="{{$personne->idPers}}">{{$personne->nomPers}} - {{$personne->prePers}}</option>
                                    @endforeach
                                </select>
                                <button id="addRealisateur">Ajouter un realisateur</button><br>
                                <button type="button" class="btnDeployFormPers" onclick="showFormPersonne()">Créer une personne</button>
                            </div>
                        </div>

                        <div id="realisateur-template" class="d-none">
                            <div class="realisateur-row mb-2 d-flex">
                                <select name="idRealisateur[]" class="inputCatalogue choixCatal idRealisateur">
                                    <option value="">Réalisateur film</option>
                                    @foreach($personnes as $personne)
                                        <option value="{{ $personne->idPers }}">
                                            {{ $personne->nomPers }} - {{ $personne->prePers }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" class="remove btnRemove">X</button>
                            </div>
                        </div>

                        <div class="row align-items-center mb-4">
                            <div class="col-12 col-lg-3">
                                <label class="h3 mb-0 pb-5">Scénariste film</label>
                            </div>
                            <div class="col-12 col-lg-4" id="scenariste-container">
                                <select name="idRealisateur[]" class="inputCatalogue choixCatal idScenariste">
                                    <option value="">Scénariste film</option>
                                    @foreach($personnes as $personne)
                                        <option value="{{$personne->idPers}}">{{$personne->nomPers}} - {{$personne->prePers}}</option>
                                    @endforeach
                                </select>
                                <button id="addScenariste">Ajouter un Scénariste</button><br>
                                <button type="button" class="btnDeployFormPers" onclick="showFormPersonne()">Créer une personne</button>
                            </div>
                        </div>

                        <div id="scenariste-template" class="d-none">
                            <div class="scenariste-row mb-2 d-flex">
                                <select name="idScenariste[]" class="inputCatalogue choixCatal idScenariste">
                                    <option value="">Scénariste film</option>
                                    @foreach($personnes as $personne)
                                        <option value="{{ $personne->idPers }}">
                                            {{ $personne->nomPers }} - {{ $personne->prePers }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" class="remove btnRemove">X</button>
                            </div>
                        </div>



                        <div class="champsActeur">

                            <div class="row align-items-center mb-4">
                                <div class="col-12 col-lg-3">
                                    <label class="h3 mb-0 pb-5">Acteur film</label>
                                </div>
                                <div class="acteur-row-champsActeur col-12 col-lg-4">
                                    <select name="idActeur[]" class="inputCatalogue choixCatal idActeur acteur-container">
                                        <option value="">Acteur film</option>
                                        @foreach($personnes as $personne)
                                            <option value="{{$personne->idPers}}">{{$personne->nomPers}} - {{$personne->prePers}}</option>
                                        @endforeach

                                    </select>
                                    <button  type="button" class="addActeur">Ajouter un acteur</button><br>
                                    <button type="button" class="btnDeployFormPers" onclick="showFormPersonne()">Créer une personne</button>

                                </div>
                            </div>

                            <div class="row align-items-center mb-4">
                                <div class="col-12 col-lg-3">
                                    <label class="h3 mb-0">Nom joué</label>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <input class="inputCatalogue nomJoue" type="text" pattern="^[A-Za-zÀ-ÿ'’\-\s]{1,50}$" placeholder="Nom Joué" required>
                                </div>
                            </div>

                            <div class="row align-items-center mb-4">
                                <div class="col-12 col-lg-3">
                                    <label class="h3 mb-0">Prénom joué</label>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <input class="inputCatalogue preJoue" type="text" pattern="^[A-Za-zÀ-ÿ'’\-\s]{1,50}$" placeholder="Prénom joué" required>
                                </div>
                            </div>

                            <div class="row align-items-center mb-4">
                                <div class="col-12 col-lg-3">
                                    <label class="h3 mb-0">Principal ou secondaire</label>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div>
                                        <input name="typeActeur_1" class="principale" id="principale" type="radio" required>
                                        <label class="h3 mb-0 me-4" for="">Principal</label>
                                        <input name="typeActeur_1" class="secondaire" id="secondaire" type="radio" required checked>
                                        <label class="h3 mb-0" for="">Secondaire</label>
                                    </div>
                                </div>
                            </div>

                            <div class="acteur-container">

                            </div>
                        </div>


                        <div id="divIdPersonne">
                        </div>

                        <div id="acteur-template" class="d-none">
                            <div class="acteur-block acteur-row">
                                <div class="row align-items-center mb-4">
                                    <div class="col-12 col-lg-3">
                                        <label class="h3 mb-0 pb-5">Acteur film</label>
                                    </div>

                                    <div class="col-12 col-lg-4" class="acteur-container">
                                        <div class="d-flex align-items-center mb-2 acteur-inline">
                                            <select name="idActeur[]" class="inputCatalogue choixCatal idActeur">
                                                <option value="">Acteur film</option>
                                                @foreach($personnes as $personne)
                                                    <option value="{{ $personne->idPers }}">
                                                        {{ $personne->nomPers }} - {{ $personne->prePers }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <button type="button" class="remove btnRemove">X</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-4">
                                    <div class="col-12 col-lg-3">
                                        <label class="h3 mb-0">Nom joué</label>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <input class="inputCatalogue nomJoue" type="text" pattern="^[A-Za-zÀ-ÿ'’\-\s]{1,50}$" placeholder="Nom Joué" required>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-4">
                                    <div class="col-12 col-lg-3">
                                        <label class="h3 mb-0">Prénom joué</label>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <input class="inputCatalogue preJoue" type="text" pattern="^[A-Za-zÀ-ÿ'’\-\s]{1,50}$" placeholder="Prénom joué" required>
                                    </div>
                                </div>

                                <div class="row align-items-center mb-4">
                                    <div class="col-12 col-lg-3">
                                        <label class="h3 mb-0">Principal ou secondaire</label>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div>
                                            <input name="typeActeur_" class="principale" id="principale" type="radio" required>
                                            <label class="h3 mb-0 me-4" for="principale">Principal</label>
                                            <input name="typeActeur_" class="secondaire" id="secondaire" type="radio" required checked>
                                            <label class="h3 mb-0" for="secondaire">Secondaire</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>

        <div class="d-flex flex-wrap justify-content-center justify-content-lg-end pt-5 pb-5">
            <button name="btnAjout" class="btn-ajoutModifSuppr" id="btnAjt"><span>Ajouter</span></button>
            <button name="btnModif" class="btn-ajoutModifSuppr" id="btnModif" ><span>Modifier</span></button>
            <button name="btnSuppr" class="btn-ajoutModifSuppr" id="btnSuppr"><span>Supprimer</span></button>

        </div>
    </main>




    <template id="tplGenre">
        <form form="formAjoutGenre" id="formAjoutGenre" class="formAjoutGenre" name="formAjoutGenre" method="post" action="">
            @csrf
            <div class="row align-items-center mb-4">
                <div class="col-12 col-lg-3 order-4 order-lg-3">
                    <label class="h3 mb-0"></label>
                </div>

                <div class="col-12 col-lg-4 order-5 order-lg-4">
                    <label class="h3 mb-0">Ajouter un genre</label>
                </div>
            </div>


            <div class="row align-items-center mb-4">
                <div class="col-12 col-lg-3 order-4 order-lg-3">
                    <label class="h3 mb-0">Libelle genre</label>
                </div>

                <div class="col-12 col-lg-4 order-5 order-lg-4">
                    <div class="d-flex align-items-center mb-2 input-inline">
                        <input
                            form="formAjoutGenre"
                            id="inputGenre"
                            class="inputCatalogue"
                            type="text"
                            pattern="^[A-Za-zÀ-ÿ'’\-\s]{2,50}$"
                            placeholder="Libelle genre"
                            required
                        >
                        <button type="button" id="removeGenre" class="btnRemove">X</button>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <div class="col-12 col-lg-3 order-4 order-lg-3">
                    <label class="h3 mb-0"></label>
                </div>
                <div class="col-12 col-lg-4 order-5 order-lg-4">
                    <button form="formAjoutGenre" id="btnSubmitFormGenre" class="btnTemplate" type="button">
                        <span>Ajouter</span>
                    </button>
                </div>
            </div>

        </form>
    </template>



    <template id="tplPersonne">
        <form form="formAjoutPersonne" class="formAjoutPersonne" id="formAjoutPersonne" method="post" action="">
            @csrf

            <div class="row align-items-center mb-4">
                <div class="col-12 col-lg-3 order-4 order-lg-3">
                    <label class="h3 mb-0"></label>
                </div>

                <div class="col-12 col-lg-4 order-5 order-lg-4">
                    <label class="h3 mb-0">Ajouter une personne</label>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <div class="col-12 col-lg-3 order-4 order-lg-3">
                    <label class="h3 mb-0">Nom personne</label>
                </div>

                <div class="col-12 col-lg-4 order-5 order-lg-4">
                    <div class="d-flex align-items-center mb-2 input-inline">
                        <input
                            form="formAjoutPersonne"
                            class="inputCatalogue"
                            id="nomPers"
                            type="text"
                            pattern="^[A-Za-zÀ-ÿ'’\-\s]{2,50}$"
                            placeholder="Nom personne"
                            required
                        >
                        <button type="button" id="removePersonne" class="btnRemove">X</button>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <div class="col-12 col-lg-3">
                    <label class="h3 mb-0">Prenom personne</label>
                </div>
                <div class="col-12 col-lg-4">
                    <input form="formAjoutPersonne" class="inputCatalogue" id="prePers" type="text" pattern="^[A-Za-zÀ-ÿ'’\-\s]{2,50}$" placeholder="Prenom personne" required>
                </div>
                <div class="col-lg-5 d-none d-lg-block"></div>
            </div>

            <div class="row align-items-center mb-4">
                <div class="col-12 col-lg-3">
                    <label class="h3 mb-0">Date de naissance</label>
                </div>
                <div class="col-12 col-lg-4">
                    <input form="formAjoutPersonne" class="inputCatalogue" id="dateNaissPers" type="date" placeholder="Date de naissance" required>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <div class="col-12 col-lg-3">
                    <label class="h3 mb-0">Lieu de naissance</label>
                </div>
                <div class="col-12 col-lg-4">
                    <input form="formAjoutPersonne" class="inputCatalogue" id="lieuNaissPers" type="text" pattern="^[A-Za-zÀ-ÿ'’\-\s]{2,100}$" placeholder="Lieu de naissance" required>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <div class="col-12 col-lg-3">
                    <label class="h3 mb-0">Photo personne</label>
                </div>
                <div class="col-12 col-lg-4">
                    <input form="formAjoutPersonne" class="inputCatalogue" id="photoPers" type="text" pattern="^https?:\/\/.+\.(jpg|jpeg|png|webp|gif)$" placeholder="Photo personne" required>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <div class="col-12 col-lg-3">
                    <label class="h3 mb-0">Bibliographie</label>
                </div>
                <div class="col-12 col-lg-4">
                    <textarea form="formAjoutPersonne" class="textareaCatalogue" id="biblio" placeholder="Bibliographie" required></textarea>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <div class="col-12 col-lg-3 order-4 order-lg-3">
                    <label class="h3 mb-0"></label>
                </div>
                <div class="col-12 col-lg-4 order-5 order-lg-4">
                    <button form="formAjoutPersonne" name="btnAjout" id="btnAjtPers" class="btnTemplate" type="button">
                        <span>Ajouter</span>
                    </button>
                </div>
            </div>

        </form>
    </template>
    <script>
        let countFormGenre = 0;
        let countFormPersonne = 0;

        function showFormGenre() {
            if (countFormGenre == 0) {
                const template = document.querySelector("#tplGenre");

                const divIdGenre = document.getElementById('divIdGenre');
                const clone = document.importNode(template.content, true);

                divIdGenre.appendChild(clone);
                countFormGenre++;
            }
        }

        function showFormPersonne() {
            if(countFormPersonne == 0) {
                const template = document.querySelector("#tplPersonne");

                const divIdPersonne = document.getElementById('divIdPersonne');
                const clone = document.importNode(template.content, true);

                divIdPersonne.appendChild(clone);
                countFormPersonne++;
            }
        }
    </script>
    @vite('resources/js/stateButtons.js')
    @vite('resources/js/gestionFilm.js')
    @vite('resources/js/updateSelect.js')
@endsection
