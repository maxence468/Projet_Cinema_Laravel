
$('#btnAjt').click(function(){
    let heureSeance = $('#heureSeance   ').val()
    let dateSeance = $('#dateSeance').val()
    let dureeSeance = $('#dureeSeance').val()
    let idFilm = $('#idFilm').val()
    let idSalle = $('#idSalle').val()


    if(heureSeance && dateSeance && dureeSeance && idFilm && idSalle){
        $.ajax({
            url: "/seances",
            type: "post",
            data:{
                heureSeance: heureSeance,
                dateSeance: dateSeance,
                dureeSeance: dureeSeance,
                idFilm: idFilm,
                idSalle: idSalle,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
                alert('Seance créé avec succès !');
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

$('#seanceModif').change(function(e){
    let idSeance = $('#seanceModif').val()

    $.ajax({
        url: "/editSeance",
        type: "post",
        global:false,
        data:{
            idSeance: idSeance,
            _token: $('input[name="_token"]').val(),
        },
        success: function(result){
            $('#heureSeance').val(result['seance']['heureSeance'])
            $('#dateSeance').val(result['seance']['dateSeance'])
            $('#dureeSeance').val(result['seance']['dureeSeance'])
            $('#idFilm').val(result['seance']['idFilm'])
            $('#idSalle').val(result['seance']['idSalle'])
        },
        error: function(error){
            console.log(error)

        }
    });

})

$('#btnModif').click(function(){
    let heureSeance = $('#heureSeance').val()
    let dateSeance = $('#dateSeance').val()
    let dureeSeance = $('#dureeSeance').val()
    let idFilm = $('#idFilm').val()
    let idSalle = $('#idSalle').val()

    let idSeance = $('#seanceModif').val()


    if(heureSeance && dateSeance && dureeSeance && idFilm && idSalle && idSeance){
        $.ajax({
            url: `/seances/${idSeance}`,
            type: "patch",
            data:{
                heureSeance: heureSeance,
                dateSeance: dateSeance,
                dureeSeance: dureeSeance,
                idFilm: idFilm,
                idSalle: idSalle,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
                alert('Seance modifié avec succès !');
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
    let idSeance = $('#seanceModif').val()

    if(!idSeance){
        alert('Sélectionne une seance à supprimer !');
        return;
    }

    // désactive le bouton pour éviter double clic
    $(this).prop('disabled', true);

    $.ajax({
        url: `/seances/${idSeance}`,
        type: 'DELETE',
        data: {
            _token: $('input[name="_token"]').val()
        },
        success: function(result){
            alert(result.message);
            $('#myForm')[0].reset();
        },
        error: function(error){
            console.log(error);
        },
        complete: function(){
            $('#btnSuppr').prop('disabled', false); // réactive le bouton
        }
    });
});

