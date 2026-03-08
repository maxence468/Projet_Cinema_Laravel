export function ajoutParticipant() {

    // sélection de toutes les templates html
    const templatePart1 = document.querySelector("#tplTarifParticipant");
    const templatePart2 = document.querySelector("#tplPrixParticipant");
    const templatePart3 = document.querySelector("#tplSupprChamp");

    // sélection de toutes les <div> ou doivent être placées les templates html
    const divIdChampsSelect = document.getElementById('divIdChampsSelect');
    const divIdPrixTarif = document.getElementById('divIdPrixTarif');
    const divIdBtnSuppr = document.getElementById('divIdBtnSuppr');

    // import des variables contenant les templates html
    const clone1 = document.importNode(templatePart1.content, true);
    const clone2 = document.importNode(templatePart2.content, true);
    const clone3 = document.importNode(templatePart3.content, true);

    // ajout des templates dans la page html
    divIdChampsSelect.appendChild(clone1);
    divIdPrixTarif.appendChild(clone2);
    divIdBtnSuppr.appendChild(clone3);
}

export function supprParticipant(button) {

    // sélection du bouton le plus près de la classe '.participant-slot'
    const btnSlot = button.closest('.participant-slot');

    // sélection de tous les buttons de suppression des champs
    const allBtnSlots = Array.from(
        document.querySelectorAll('#divIdBtnSuppr .participant-slot')
    );

    const index = allBtnSlots.indexOf(btnSlot);

    if (index === -1) return;

    // sélection de tous les champs, prix, et boutons de suppressions dans la page 'effectuerReservation' et 'modifierReservation'
    const tarifSlots = document.querySelectorAll('#divIdChampsSelect .participant-slot');
    const prixSlots = document.querySelectorAll('#divIdPrixTarif .participant-slot');
    const supprSlots = document.querySelectorAll('#divIdBtnSuppr .participant-slot');

    tarifSlots[index]?.remove();
    prixSlots[index]?.remove();
    supprSlots[index]?.remove();
}
