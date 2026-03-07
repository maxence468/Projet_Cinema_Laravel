import { ajoutParticipant, supprParticipant } from './reservationParticipant.js';

export function initEffectuerReservationPage() {
    const page = document.getElementById('pageEffectuerReservation');
    if (!page) return;

    page.querySelector('.btnAjoutPersReserv')?.addEventListener('click', ajoutParticipant);

    page.addEventListener('click', (event) => {
        const button = event.target.closest('.btnSupprParticipant');
        if (!button) return;

        supprParticipant(button);
    });
}
