
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
        let val = $(this).val();
        return val !== "" ? val : null;
    }).get();

    if(titreFilm && descFilm && dateSortieFilm && dureeFilm && posterFilm && idGenre && idRealisateurs && idScenaristes && idActeurs){
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
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
                supprimerRealScenariste();
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
            }
        });
    }else{
        alert('Tous les champs doivent etre remplis');
    }
});

$('#filmModif').change(function(e){
    let idFilm = $('#filmModif').val()

    $.ajax({
        url: "/editFilm",
        type: "post",
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

            supprimerRealScenariste()
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
            if(acteurs.length > 0){
                $('#acteur-container .idActeur:first').val(acteurs[0]['idPers'])
            }
            acteurs.slice(1).forEach(function(acteur){
                let html = $('#acteur-template').html();
                let $row = $(html);
                $row.find('select').val(acteur['idPers']);
                $('#acteur-container').append($row);
            });
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

    let idFilm = $('#filmModif').val();

    if(titreFilm && descFilm && dateSortieFilm && dureeFilm && posterFilm && idGenre && idRealisateurs && idScenaristes && idActeurs){
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
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
                supprimerRealScenariste()
                alert('Film modifié avec succès !');
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
            }
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

    // désactive le bouton pour éviter double clic
    $(this).prop('disabled', true);

    $.ajax({
        url: `/films/${idFilm}`,
        type: 'DELETE',
        data: {
            _token: $('input[name="_token"]').val()
        },
        success: function(result){
            alert(result.message);
            $('#myForm')[0].reset();
            supprimerRealScenariste()
        },
        error: function(error){
            console.log(error);
        },
        complete: function(){
            $('#btnSuppr').prop('disabled', false); // réactive le bouton
        }
    });
});

$('#addScenariste').click(function(e){
    e.preventDefault()
    let html = $('#scenariste-template').html();
    $('#scenariste-container').append(html);
})
$('#addActeur').click(function(e){
    e.preventDefault()
    let html = $('#acteur-template').html();
    $('#acteur-container').append(html);
})
$('#addRealisateur').click(function (e) {
    e.preventDefault()
    let html = $('#realisateur-template').html();
    $('#realisateurs-container').append(html);
});

$(document).on('click', '.remove', function () {
    $(this).closest('.realisateur-row').remove();
});
$(document).on('click', '.remove', function () {
    $(this).closest('.acteur-row').remove();
});
$(document).on('click', '.remove', function () {
    $(this).closest('.scenariste-row').remove();
});

function supprimerRealScenariste(){
    $('.realisateur-row').not('#realisateur-template .realisateur-row ').remove();
    $('.scenariste-row').not('#scenariste-template .scenariste-row ').remove();
    $('.acteur-row').not('#acteur-template .acteur-row ').remove();
}

$(document).on('change','.idActeur', function(e){
    let valeur = $(this).val();

    let $row = $(this).closest('.acteur-row-champsActeur');
    let $champs = $row.find('.champsActeur');

    if(valeur){
        $champs.show();
    }else{
        $champs.hide();
    }
})

