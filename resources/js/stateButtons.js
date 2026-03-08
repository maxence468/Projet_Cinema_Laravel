let ajaxErrorOccured = false;

//debut toutes requetes ajax
$(document).ajaxStart(function () {
    //desactive tous les boutons
    stateButtons('off');
    //remet à 0 les erreurs
    ajaxErrorOccured = false;
})
$(document).ajaxError(function(event, xhr, settings) {
    // ignorer requete post
    if (settings.type.toUpperCase() === 'POST') {
        return;
    }
    //si une erreur
    ajaxErrorOccured = true;
});
//fin toutes requete ajax
$(document).ajaxStop(function () {
    //si erreur sur une requete de modif ou suppression
    if(ajaxErrorOccured){
        stateButtons('modifier-supprimer');
        console.log('base');
    }
    else{
        stateButtons('base');
    }

});

$('#filmModif, #genreModif, #personneModif, #castingModif, #cinemaModif, #salleModif, #seanceModif, #tarifModif, #typeSalleModif').change(function(e){
    let idPers = $('#filmModif, #genreModif, #personneModif, #cinemaModif, #salleModif, #seanceModif, #tarifModif, #typeSalleModif').val()
    if(!idPers){
        $('#myForm')[0].reset();
        stateButtons('base')
        return;
    }
    stateButtons('modifier-supprimer')

});

stateButtons('base');
function stateButtons(state){
    if(state === 'modifier-supprimer'){
        desactiverBtn('#btnAjt');
        activerBtn('#btnModif');
        activerBtn('#btnSuppr');
    }
    else if(state === 'off'){
        desactiverBtn('#btnAjt');
        desactiverBtn('#btnModif');
        desactiverBtn('#btnSuppr');

    }
    else{
        activerBtn('#btnAjt');
        desactiverBtn('#btnModif');
        desactiverBtn('#btnSuppr');
    }
}
function activerBtn(selector) {
    $(selector)
        .prop('disabled', false)
        .css('background-color', '#991917')
        .css("pointer-events", "auto");
}
function desactiverBtn(selector) {
    $(selector)
        .prop('disabled', true)
        .css('background-color', '#1c1c1c')
        .css("pointer-events", "none");
}
