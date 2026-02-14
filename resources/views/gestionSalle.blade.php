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
                                <label class="h3 mb-0">Capacité salle</label>
                            </div>

                            <div class="col-12 col-lg-4 order-5 order-lg-4">
                                <input class="inputCatalogue" type="text" placeholder="Capacité salle" required>
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
                                <label class="h3 mb-0">Type de salle</label>
                            </div>
                            <div class="col-12 col-lg-4">
                                <input class="inputCatalogue" type="text" placeholder="Type de salle" required>                            </div>
                            <div class="col-lg-5 d-none d-lg-block"></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap justify-content-center justify-content-lg-end pt-5 pb-5">
            <button form="myForm" name="btnAjout" class="btn-ajoutModifSuppr" type="submit"><span>Ajouter</span></button>
            <button form="myForm" name="btnModif" class="btn-ajoutModifSuppr" type="submit"><span>Modifier</span></button>
            <button form="myForm" name="btnSuppr" class="btn-ajoutModifSuppr" type="submit"><span>Supprimer</span></button>
        </div>
    </main>
    <script>
        /*function submitForm(action) {
            const form = document.getElementById('');
            const methodInput = document.getElementById('');
            const actionInput = document.getElementBydId('');

            actionInput.value = action;

            switch (action) {
                case 'create':
                    form.action = "<route('posts.store')";
                    methodInput.value = 'POST';
                    break;

                case 'update';
                    form.action = " route('posts.update'), $post->id ?? 0"
                    methodInput.value = 'PATCH';
                    break;

                case 'delete':
                    if(!confirm('Êtes vous sure ?')) {
                        event.preventDefault();
                        return;
                    }
                    form.action = "route('posts.destroy', $post->id ?? 0)"
                    methodInput.value = 'DELETE';
                    break;
            }
        }*/
    </script>
@endsection
