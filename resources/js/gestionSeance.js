
$('#btnAjt').click(function(){
    let heureSeance = $('#heureSeance').val()
    let dateSeance = $('#dateSeance').val()
    let dureeSeance = $('#dureeSeance').val()
    let idFilm = $('#idFilm').val()
    let idSalle = $('#idSalle').val()


    if(heureSeance && dateSeance && dureeSeance && idFilm && idSalle){
        $.ajax({
            url: "/seances",
            type: "post",
            headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
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
        data:{
            idSeance: idSeance,
            _token: $('input[name="_token"]').val(),
        },
        success: function(result){
            var s = result['seance'];
            var heure = s['heureSeance'];
            var date = s['dateSeance'];
            if (heure && heure.length > 5) heure = heure.substring(0, 5);
            if (date && date.length > 10) date = date.substring(0, 10);
            $('#heureSeance').val(heure || '');
            $('#dateSeance').val(date || '');
            $('#dureeSeance').val(s['dureeSeance'] || '');
            $('#idFilm').val(s['idFilm'] || '');
            $('#idSalle').val(s['idSalle'] || '');
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

    if(!idSeance){
        alert('Sélectionne une séance à modifier.');
        return;
    }
    if(heureSeance && dateSeance && dureeSeance && idFilm && idSalle){
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

