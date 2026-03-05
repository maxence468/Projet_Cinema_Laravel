$(document).ajaxStart(function () {
    stateButtons('off');
    console.log('off');
})
$(document).ajaxStop(function () {
    stateButtons('base');
    console.log('base');
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
        .css('background-color', 'black')
        .css("pointer-events", "none");
}
