@extends('layout')

@section('title', 'Page modifier une réservation')

@section('main')
    <main id="pageModifierReservation">
        <h2 class="d-flex justify-content-center pt-3">Modifier une réservation</h2>

        <div class="contentPageReserv">
            <div class="row pt-5">
                <div class="col-auto">
                    <h3>Séance</h3>
                    <img class="pt-1" src="images/interstellar.jpg" width="170" height="259" alt="test">
                </div>

                <div class="col-auto ps-4 mt-4 pt-3">
                    <h3>Nom du film</h3>
                    <p>Nom du cinéma</p>
                    <p>Salle</p>
                    <p>Date et heure</p>
                    <p>Nombre de places restantes</p>
                </div>
            </div>

            <div class="row">
                <h3 class="pt-4">Participants</h3>

                <div class="col-auto">
                    <h3 class="pt-1">Tarif</h3>

                    <div id="divIdChampsSelect" class="participant-stack">
                        <div class="participant-slot">
                            <select class="selectTarif" required>
                                <option value=""></option>
                                <option>Etudiant</option>
                            </select>
                        </div>
                    </div>

                    <button type="button" class="btnAjoutPersReserv mt-4">
                        Ajouter une personne
                    </button>
                </div>

                <div class="col-auto ms-5">
                    <h3>Prix</h3>

                    <div id="divIdPrixTarif" class="participant-stack">
                        <div class="participant-slot participant-text">
                            <h3 class="prixParTarif">Price</h3>
                        </div>
                    </div>
                </div>

                <div class="col-auto ms-4 btnSuppr">
                    <div id="divIdBtnSuppr" class="participant-stack">
                        <div class="participant-slot">
                            <button type="button" class="btnSupprParticipant">
                                <h3><i class="bi bi-trash"></i></h3>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex w-100 reserverSmallScreen">
            <div class="d-flex flex-column align-items-center">
                <div class="totalPrice pt-5">
                    <h3 class="text-center mb-3">Total : price</h3>
                </div>

                <button class="btnReserv">Réserver</button>
            </div>
        </div>
    </main>

    <template id="tplTarifParticipant">
        <div class="participant-slot">
            <select class="selectTarif" required>
                <option value=""></option>
            </select>
        </div>
    </template>

    <template id="tplPrixParticipant">
        <div class="participant-slot participant-text">
            <h3>Price</h3>
        </div>
    </template>

    <template id="tplSupprChamp">
        <div class="participant-slot">
            <button type="button" class="btnSupprParticipant">
                <h3><i class="bi bi-trash"></i></h3>
            </button>
        </div>
    </template>
@endsection
