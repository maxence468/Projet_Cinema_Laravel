/**
 * gestionActionnaire.js
 * Gère les actions CRUD (Ajouter / Modifier / Supprimer) sur les actionnaires
 * via fetch() vers les routes Laravel de l'ActionnaireController.
 */

const select    = document.getElementById('listeActionnaire');
const nomInput  = document.getElementById('nomActio');
const preInput  = document.getElementById('preActio');
const cinInput  = document.getElementById('idCinema');
const argInput  = document.getElementById('argentInv');
const idHidden  = document.getElementById('idActio');

const btnAjt    = document.getElementById('btnAjt');
const btnModif  = document.getElementById('btnModif');
const btnSuppr  = document.getElementById('btnSuppr');
select.addEventListener('change', () => {
    const opt = select.options[select.selectedIndex];
    if (!opt.value) {
        clearForm();
        return;
    }
    idHidden.value  = opt.value;
    nomInput.value  = opt.dataset.nom   ?? '';
    preInput.value  = opt.dataset.pre   ?? '';
    argInput.value  = opt.dataset.argent ?? '';
    const cinemaId = opt.dataset.cinema ?? '';
    cinInput.value = cinemaId;
});

btnAjt.addEventListener('click', async () => {
    if (!validateForm()) return;

    const body = buildPayload();

    try {
        const res = await fetch(routeAjout, {
            method: 'POST',
            headers: buildHeaders(),
            body: JSON.stringify(body),
        });

        const data = await res.json();

        if (res.ok) {
            addOptionToSelect(data.actionnaire);
            clearForm();
            showFlash('Actionnaire ajouté avec succès.', 'success');
        } else {
            showFlash(data.message ?? 'Erreur lors de l\'ajout.', 'error');
        }
    } catch (e) {
        showFlash('Erreur réseau.', 'error');
    }
});

btnModif.addEventListener('click', async () => {
    if (!idHidden.value) {
        showFlash('Sélectionnez d\'abord un actionnaire à modifier.', 'error');
        return;
    }
    if (!validateForm()) return;

    const url  = routeModif.replace('__ID__', idHidden.value);
    const body = buildPayload();

    try {
        const res = await fetch(url, {
            method: 'PUT',
            headers: buildHeaders(),
            body: JSON.stringify(body),
        });

        const data = await res.json();

        if (res.ok) {
            updateOptionInSelect(idHidden.value, data.actionnaire);
            showFlash('Actionnaire modifié avec succès.', 'success');
        } else {
            showFlash(data.message ?? 'Erreur lors de la modification.', 'error');
        }
    } catch (e) {
        showFlash('Erreur réseau.', 'error');
    }
});
btnSuppr.addEventListener('click', async () => {
    if (!idHidden.value) {
        showFlash('Sélectionnez d\'abord un actionnaire à supprimer.', 'error');
        return;
    }

    if (!confirm('Supprimer cet actionnaire ?')) return;

    const url = routeSuppr.replace('__ID__', idHidden.value);

    try {
        const res = await fetch(url, {
            method: 'DELETE',
            headers: buildHeaders(),
        });

        const data = await res.json();

        if (res.ok) {
            removeOptionFromSelect(idHidden.value);
            clearForm();
            showFlash('Actionnaire supprimé.', 'success');
        } else {
            showFlash(data.message ?? 'Erreur lors de la suppression.', 'error');
        }
    } catch (e) {
        showFlash('Erreur réseau.', 'error');
    }
});

function validateForm() {
    if (!nomInput.value.trim()) {
        showFlash('Le nom est obligatoire.', 'error');
        nomInput.focus();
        return false;
    }
    if (!preInput.value.trim()) {
        showFlash('Le prénom est obligatoire.', 'error');
        preInput.focus();
        return false;
    }
    return true;
}

function clearForm() {
    idHidden.value = '';
    nomInput.value = '';
    preInput.value = '';
    cinInput.value = '';
    argInput.value = '';
    select.value   = '';
}

function addOptionToSelect(actionnaire) {
    const opt = buildOption(actionnaire);
    select.appendChild(opt);
    select.value = actionnaire.idActio;
}

function updateOptionInSelect(id, actionnaire) {
    const opt = select.querySelector(`option[value="${id}"]`);
    if (!opt) return;
    opt.textContent       = `${actionnaire.preActio} ${actionnaire.nomActio}`;
    opt.dataset.nom       = actionnaire.nomActio;
    opt.dataset.pre       = actionnaire.preActio;
    opt.dataset.cinema    = actionnaire.idCinema   ?? '';
    opt.dataset.argent    = actionnaire.argentInv  ?? '';
}

function removeOptionFromSelect(id) {
    const opt = select.querySelector(`option[value="${id}"]`);
    if (opt) opt.remove();
}

function buildOption(actionnaire) {
    const opt = document.createElement('option');
    opt.value           = actionnaire.idActio;
    opt.textContent     = `${actionnaire.preActio} ${actionnaire.nomActio}`;
    opt.dataset.nom     = actionnaire.nomActio;
    opt.dataset.pre     = actionnaire.preActio;
    opt.dataset.cinema  = actionnaire.idCinema  ?? '';
    opt.dataset.argent  = actionnaire.argentInv ?? '';
    return opt;
}

function showFlash(message, type) {
    // Supprime un éventuel flash existant
    document.querySelectorAll('.flash-js').forEach(el => el.remove());

    const div = document.createElement('div');
    div.className = `alert alert-${type === 'success' ? 'success' : 'danger'} flash-js mt-3`;
    div.textContent = message;

    const container = document.querySelector('.espaceSideBar .container-fluid');
    container.prepend(div);

    setTimeout(() => div.remove(), 4000);
}
