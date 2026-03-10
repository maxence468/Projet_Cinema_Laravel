

$('#btnAjt').click(function(){
    let titreFilm = $('#titreFilm').val()
    let descFilm = $('#descFilm').val()
    let dateSortieFilm = $('#dateSortieFilm').val()
    let dureeFilm = $('#dureeFilm').val()
    let posterFilm = $('#posterFilm').val()
    let idGenre = $('#idGenre').val()
    let idRealisateurs = $('.idRealisateur').map(function () {
        let val = $(this).val();
        return val !== "" ? val : null;
    }).get();

    let idScenaristes = $('.idScenariste').map(function () {
        let val = $(this).val();
        return val !== "" ? val : null;
    }).get();

    let idActeurs = $('.idActeur').map(function(){
        let val = $(this).val();
        return val !== "" ? val : null;
    }).get();

    let nomJoue = $('.nomJoue').map(function(){
        return $(this).val();
    }).get();

    let preJoue = $('.preJoue').map(function(){
        return $(this).val();
    }).get();

    let principale = $('.principale').map(function(){
        if($(this).is(':checked')){
            return 1;
        }
        return 0;
    }).get();

    let secondaire = $('.secondaire').map(function(){
        if($(this).is(':checked')){
            return 1;
        }
        return 0;
    }).get();

    if(titreFilm && descFilm && dateSortieFilm && dureeFilm && posterFilm && idGenre && idRealisateurs.length && idScenaristes.length && idActeurs.length && nomJoue.length && preJoue.length && principale.length && secondaire.length){
        $.ajax({
            url: "/films",
            type: "post",
            data:{
                titreFilm: titreFilm,
                descFilm: descFilm,
                dateSortieFilm: dateSortieFilm,
                dureeFilm: dureeFilm,
                posterFilm: posterFilm,
                idGenre: idGenre,
                idRealisateurs: idRealisateurs,
                idScenaristes: idScenaristes,
                idActeurs: idActeurs,
                nomJoue: nomJoue,
                preJoue: preJoue,
                principale: principale,
                secondaire: secondaire,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
                supprimerRealScenaristeActeur();
                alert('Film créé avec succès !');
            },
            error: function(error){
                if(error.responseJSON) {
                    // Récupère les erreurs
                    let errors = error.responseJSON.errors;

                    // Exemple : récupérer le premier message d’erreur
                    let firstError = Object.values(errors)[0][0];

                    console.log(firstError);
                    alert(firstError);
                } else {
                    console.log("Erreur inconnue !");
                }
            },
        });
    }else{
        alert('Tous les champs doivent etre remplis');
    }
});

$('#filmModif').change(function(e){
    let idFilm = $('#filmModif').val()
    if(!idFilm){
        supprimerRealScenaristeActeur()
        return;
    }

    $.ajax({
        url: "/editFilm",
        type: "post",
        global:false,
        data:{
            idFilm: idFilm,
            _token: $('input[name="_token"]').val(),
        },
        success: function(result){

            $('#titreFilm').val(result['film']['titreFilm'])
            $('#descFilm').val(result['film']['descFilm'])
            $('#dateSortieFilm').val(result['film']['dateSortieFilm'])
            $('#dureeFilm').val(result['film']['dureeFilm'])
            $('#posterFilm').val(result['film']['posterFilm'])
            $('#idGenre').val(result['film']['idGenre'])

            supprimerRealScenaristeActeur()
            let realisateurs = result['realisateurs']
            if(realisateurs.length > 0){
                $('#realisateurs-container .idRealisateur:first').val(realisateurs[0]['idPers']);
            }
            realisateurs.slice(1).forEach(function(real) {
                let html = $('#realisateur-template').html();
                let $row = $(html);
                $row.find('select').val(real['idPers']);
                $('#realisateurs-container').append($row);
            });

            let scenaristes = result['scenaristes']
            if(scenaristes.length > 0){
                $('#scenariste-container .idScenariste:first').val(scenaristes[0]['idPers']);
            }
            scenaristes.slice(1).forEach(function(scenariste) {
                let html = $('#scenariste-template').html();
                let $row = $(html);
                $row.find('select').val(scenariste['idPers']);
                $('#scenariste-container').append($row);
            });

            let acteurs = result['acteurs']
            console.log(acteurs[0]['idPers'])
            if(acteurs.length > 0){
                $('.idActeur:first').val(acteurs[0]['idPers']).trigger('change')

                $('.nomJoue:first').val(acteurs[0]['pivot']['nomJoue'])
                $('.preJoue:first').val(acteurs[0]['pivot']['preJoue'])

                if(acteurs[0]['pivot']['principale'] === 1){
                    $('.principale:first').prop('checked', true);
                }
            }
            acteurs.slice(1).forEach(function(acteur){
                let html = $('#acteur-template').html();
                let $row = $(html);
                let newName = 'typeActeur_' + index;
                index++
                $row.find('.principale, .secondaire').attr('name', newName);
                $('.acteur-container').append($row);


                $row.find('select').val(acteur['idPers']).trigger('change');

                $row.find('.nomJoue').val(acteur['pivot']['nomJoue'])
                $row.find('.preJoue').val(acteur['pivot']['preJoue'])

                if(acteur['pivot']['principale'] === 1){
                    $row.find('.principale').prop('checked', true);
                }
            });

            blockOptionSelect(scenariste)
            blockOptionSelect(acteur)
            blockOptionSelect(realisateur)

        },
        error: function(error){
            console.log(error)
        }
    });
})

$('#btnModif').click(function(){
    let titreFilm = $('#titreFilm').val()
    let descFilm = $('#descFilm').val()
    let dateSortieFilm = $('#dateSortieFilm').val()
    let dureeFilm = $('#dureeFilm').val()
    let posterFilm = $('#posterFilm').val()
    let idGenre = $('#idGenre').val()

    let idRealisateurs = $('.idRealisateur').map(function () {
        let val = $(this).val();
        return val !== "" ? val : null;
    }).get();

    let idScenaristes = $('.idScenariste').map(function () {
        let val = $(this).val();
        return val !== "" ? val : null;
    }).get();

    let idActeurs = $('.idActeur').map(function(){
        let val = $(this).val();
        return val !== "" ? val : null;
    }).get();

    let nomJoue = $('.nomJoue').map(function(){
        return $(this).val();
    }).get();

    let preJoue = $('.preJoue').map(function(){
        return $(this).val();
    }).get();

    let principale = $('.principale').map(function(){
        if($(this).is(':checked')){
            return 1;
        }
        return 0;
    }).get();

    let secondaire = $('.secondaire').map(function(){
        if($(this).is(':checked')){
            return 1;
        }
        return 0;
    }).get();

    let idFilm = $('#filmModif').val();

    if(titreFilm && descFilm && dateSortieFilm && dureeFilm && posterFilm && idGenre && idRealisateurs.length && idScenaristes.length && idActeurs.length && nomJoue.length && preJoue.length && principale.length && secondaire.length){
        $.ajax({
            url: `/films/${idFilm}`,
            type: "patch",
            data:{
                titreFilm: titreFilm,
                descFilm: descFilm,
                dateSortieFilm: dateSortieFilm,
                dureeFilm: dureeFilm,
                posterFilm: posterFilm,
                idRealisateurs: idRealisateurs,
                idScenaristes: idScenaristes,
                idActeurs: idActeurs,
                idGenre: idGenre,
                nomJoue: nomJoue,
                preJoue: preJoue,
                principale: principale,
                secondaire: secondaire,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                console.log(result['request'])
                $('#myForm')[0].reset();
                supprimerRealScenaristeActeur()
                alert('Film modifié avec succès !');
            },
            error: function(error){
                if(error.responseJSON) {
                    // Récupère les erreurs
                    let errors = error.responseJSON.errors;

                    // Exemple : récupérer le premier message d’erreur
                    let firstError = Object.values(errors)[0][0];

                    alert(firstError);
                } else {
                    console.log("Erreur inconnue !");
                }
            },
        });
    }else{
        alert('Tous les champs doivent etre remplis');
    }
});

$('#btnSuppr').click(function(){
    let idFilm = $('#filmModif').val();

    if(!idFilm){
        alert('Sélectionne un film à supprimer !');
        return;
    }
    $.ajax({
        url: `/films/${idFilm}`,
        type: 'DELETE',
        data: {
            _token: $('input[name="_token"]').val()
        },
        success: function(result){
            alert(result.message);
            $('#myForm')[0].reset();
            supprimerRealScenaristeActeur()
            stateButtons('base')
        },
        error: function(error){
            console.log(error);
        },
    });
});

$('#addScenariste').click(function(e){
    e.preventDefault()
    let html = $('#scenariste-template').html();
    $('#scenariste-container').append(html);
})

let index = 2
$('.addActeur').click(function(e){
    e.preventDefault()
    let $html = $($('#acteur-template').html());

    let newName = 'typeActeur_' + index;
    $html.find('.principale, .secondaire').attr('name', newName);

    $('.acteur-container').append($html);

    index++
})
$('#addRealisateur').click(function (e) {
    e.preventDefault()
    let html = $('#realisateur-template').html();
    $('#realisateurs-container').append(html);
});

$(document).on('click', '.remove', function () {
    $(this).closest('.realisateur-row').remove();
    blockOptionSelect();
});
$(document).on('click', '.remove', function () {
    $(this).closest('.acteur-row').remove();
    blockOptionSelect();

});

$(document).on('click', '.remove', function () {
    $(this).closest('.scenariste-row').remove();
    blockOptionSelect();
});

function supprimerRealScenaristeActeur(){
    $('.realisateur-row').not('#realisateur-template .realisateur-row ').remove();
    $('.scenariste-row').not('#scenariste-template .scenariste-row ').remove();
    $('.acteur-row').not('#acteur-template .acteur-row ').remove();
    blockOptionSelect();
}


//desactiver les options deja selectionnés des select
let scenariste = '.idScenariste'
let acteur = '.idActeur'
let realisateur = '.idRealisateur'
$(document).on('change', '.idScenariste', function(){
    blockOptionSelect(scenariste)
});
$(document).on('change', '.idActeur', function(){
    blockOptionSelect(acteur)
});
$(document).on('change', '.idRealisateur', function(){
    blockOptionSelect(realisateur)
});

function blockOptionSelect(typePersonne){
    // Réactiver toutes les options
    $(typePersonne + " option").prop("disabled", false);

    let selected = [];
    // Récupérer toutes les valeurs choisies
    $(typePersonne).each(function () {
        let v = $(this).val();
        if (v) {
            selected.push(v);
        }
    });
    // Désactiver les valeurs déjà prises
    $(typePersonne).each(function () {
        let select = $(this);
        selected.forEach(function (val) {
            if (select.val() !== val) {
                select.find(`option[value="${val}"]`).prop("disabled", true);
            }
        });
    });
}


$(document).on('click','#btnSubmitFormGenre', function(e){
    e.preventDefault();

    const libGenre = $('#inputGenre').val().trim();
    //
    //     if (newGenre !== '') {
    //         $('#idGenre').append(
    //             $('<option>', {
    //                 value: newGenre,
    //                 text: newGenre,
    //                 selected: true
    //             })
    //         );
    $.ajax({
        url: `/genres`,
        type: 'POST',
        data: {
            libGenre: libGenre,
            _token: $('input[name="_token"]').val()
        },
        success: function(result){
            alert('Le genre a été crée');
            $('#inputGenre').val('');

            $('.formAjoutGenre').hide();
            $('.btnAjoutFormGenre').show();
        },
        error: function(error){
            console.log(error);
            alert('Le champs doit être rempli');
        },
    });
});

$(document).on('click', '.btnAjoutFormGenre', function(e) {
    $('.btnAjoutFormGenre').hide();
    $('.formAjoutGenre').show();
});

$(document).on('click', '.btnDeployFormPers',function(e) {
    e.preventDefault;
    $('.btnDeployFormPers').hide();
    $('#formAjoutPersonne').show();
});

$(document).on('click', '#removePersonne', function () {
    $('#formAjoutPersonne').hide();
    $('.btnDeployFormPers').show();
});

$(document).on('click', '#removeGenre', function () {
    $('#formAjoutGenre').hide();
    $('.btnAjoutFormGenre').show();
});

$(document).on('click', '#btnAjtPers',function(e) {
    e.preventDefault;

    const nomPers = $('#nomPers').val();
    const prePers = $('#prePers').val();
    const dateNaissPers = $('#dateNaissPers').val();
    const lieuNaissPers = $('#lieuNaissPers').val();
    const photoPers = $('#photoPers').val();
    const biblio = $('#biblio').val();

    $.ajax({
        url: `/personnes`,
        type: 'POST',
        data: {
            nomPers: nomPers,
            prePers: prePers,
            dateNaissPers: dateNaissPers,
            lieuNaissPers: lieuNaissPers,
            photoPers: photoPers,
            biblio: biblio,
            _token: $('input[name="_token"]').val()
        },
        success: function(result){
            alert('La personne a été crée');
            $("#formAjoutPersonne")[0].reset();
            $('#formAjoutPersonne').hide();
            $('.btnDeployFormPers').show();
        },
        error: function(error){
            console.log(error);
            alert('Le champs doit être rempli');
        },
    });



});

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
