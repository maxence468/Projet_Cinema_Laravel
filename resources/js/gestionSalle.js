
$('#btnAjt').click(function(){
    let idCinema = $('#idCinema').val()
    let idTypeSalle = $('#idTypeSalle').val()
    let numeroSalle = $('#numeroSalle').val()
    let capaciteSal = $('#capaciteSal').val()
    let idTarif = $('#idTarif').val()

    if(capaciteSal && idTypeSalle && idCinema && numeroSalle && idTarif){
        $.ajax({
            url: "/salles",
            type: "post",
            data:{
                capaciteSal: capaciteSal,
                idTypeSalle: idTypeSalle,
                idCinema: idCinema,
                idTarif: idTarif,
                numeroSalle: numeroSalle,
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
    if(!idSalle){
        return;
    }
    $.ajax({
        url: "/editSalle",
        type: "post",
        global:false,
        data:{
            idSalle: idSalle,
            _token: $('input[name="_token"]').val(),
        },
        success: function(result){
            $('#capaciteSal').val(result['salle']['capaciteSal'])
            $('#idTypeSalle').val(result['salle']['idTypeSalle'])
            $('#idCinema').val(result['salle']['idCinema'])
            $('#numeroSalle').val(result['salle']['idSalle'])
            $('#idTarif').val(result['salle']['tarifs'][0]['idTarif'])

            console.log(result['salle'])
        },
        error: function(error){
            console.log(error)

        }
    });

})

$('#btnModif').click(function(){
    let idCinema = $('#idCinema').val()
    let idTypeSalle = $('#idTypeSalle').val()
    let numeroSalle = $('#numeroSalle').val()
    let capaciteSal = $('#capaciteSal').val()
    let idTarif = $('#idTarif').val()

    let idSalle = $('#salleModif').val()

    if(capaciteSal && idTypeSalle && idCinema && numeroSalle && idTarif){
        $.ajax({
            url: `/salles/${idSalle}`,
            type: "patch",
            data:{
                capaciteSal: capaciteSal,
                idTypeSalle: idTypeSalle,
                idCinema: idCinema,
                numeroSalle: numeroSalle,
                idTarif: idTarif,
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
    });
});

