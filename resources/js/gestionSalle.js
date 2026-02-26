
$('#btnAjt').click(function(){
    let capaciteSal = $('#capaciteSal').val()
    let idTypeSalle = $('#idTypeSalle').val()
    let idCinema = 1

    if(capaciteSal && idTypeSalle && idCinema){
        $.ajax({
            url: "/salles",
            type: "post",
            data:{
                capaciteSal: capaciteSal,
                idTypeSalle: idTypeSalle,
                idCinema: idCinema,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
                alert('Salle créé avec succès !');
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

$('#salleModif').change(function(e){
    let idSalle = $('#salleModif').val()

    $.ajax({
        url: "/editSalle",
        type: "post",
        data:{
            idSalle: idSalle,
            _token: $('input[name="_token"]').val(),
        },
        success: function(result){
            $('#capaciteSal').val(result['salle']['capaciteSal'])
            $('#idTypeSalle').val(result['salle']['idTypeSalle'])
        },
        error: function(error){
            console.log(error)

        }
    });

})

$('#btnModif').click(function(){
    let capaciteSal = $('#capaciteSal').val()
    let idTypeSalle = $('#idTypeSalle').val()
    let idCinema = 1

    let idSalle = $('#salleModif').val()


    if(capaciteSal && idTypeSalle && idCinema){
        $.ajax({
            url: `/salles/${idSalle}`,
            type: "patch",
            data:{
                capaciteSal: capaciteSal,
                idTypeSalle: idTypeSalle,
                idCinema: idCinema,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
                alert('Salle modifiée avec succès !');
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
    let idSalle = $('#salleModif').val()

    if(!idSalle){
        alert('Sélectionne une salle à supprimer !');
        return;
    }

    // désactive le bouton pour éviter double clic
    $(this).prop('disabled', true);

    $.ajax({
        url: `/salles/${idSalle}`,
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

