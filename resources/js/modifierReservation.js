import { ajoutParticipant, supprParticipant } from './reservationParticipant.js';

export function initModifierReservationPage() {
    const page = document.getElementById('pageModifierReservation');
    if (!page) return;

    page.querySelector('.btnAjoutPersReserv')?.addEventListener('click', () => {
        ajoutParticipant();
        majPrixModifReserv();
    });

    page.addEventListener('click', (event) => {
        const button = event.target.closest('.btnSupprParticipant');
        if (!button) return;

        supprParticipant(button);
        majPrixModifReserv();
    });

    page.addEventListener('change', (event) => {
        const select = event.target.closest('.selectTarif');
        if (!select) return;

        majPrixModifReserv();
    });

    majPrixModifReserv();
}

export function majPrixModifReserv() {
    const allSelects = Array.from(document.querySelectorAll('.selectTarif'));
    const allPrices = document.querySelectorAll('.prixParTarif');

    let totalPrice = 0;

    allSelects.forEach((select, index) => {
        const itemPrice = parseFloat(select.value) || 0;

        if (allPrices[index]) {
            allPrices[index].textContent = `${itemPrice} €`;
        }

        totalPrice += itemPrice;
    });

    const totalElement = document.getElementById('prixTotal');
    if (totalElement) {
        totalElement.textContent = `Total : ${totalPrice} €`;
    }
}
