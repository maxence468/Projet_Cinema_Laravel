export function ajoutParticipant() {

    const templatePart1 = document.querySelector("#tplTarifParticipant");
    const templatePart2 = document.querySelector("#tplPrixParticipant");
    const templatePart3 = document.querySelector("#tplSupprChamp");

    const divIdChampsSelect = document.getElementById('divIdChampsSelect');
    const divIdPrixTarif = document.getElementById('divIdPrixTarif');
    const divIdBtnSuppr = document.getElementById('divIdBtnSuppr');

    const clone1 = document.importNode(templatePart1.content, true);
    const clone2 = document.importNode(templatePart2.content, true);
    const clone3 = document.importNode(templatePart3.content, true);

    divIdChampsSelect.appendChild(clone1);
    divIdPrixTarif.appendChild(clone2);
    divIdBtnSuppr.appendChild(clone3);
}

export function supprParticipant(button) {

    const btnSlot = button.closest('.participant-slot');

    const allBtnSlots = Array.from(
        document.querySelectorAll('#divIdBtnSuppr .participant-slot')
    );

    const index = allBtnSlots.indexOf(btnSlot);

    if (index === -1) return;

    const tarifSlots = document.querySelectorAll('#divIdChampsSelect .participant-slot');
    const prixSlots = document.querySelectorAll('#divIdPrixTarif .participant-slot');
    const supprSlots = document.querySelectorAll('#divIdBtnSuppr .participant-slot');

    tarifSlots[index]?.remove();
    prixSlots[index]?.remove();
    supprSlots[index]?.remove();
}
