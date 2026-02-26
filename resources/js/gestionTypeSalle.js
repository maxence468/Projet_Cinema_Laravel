
$('#btnAjt').click(function(){
    let libTypeSalle = $('#libTypeSalle').val()
    let prixTypeSalle = $('#prixTypeSalle').val()


    if(libTypeSalle && prixTypeSalle){
        $.ajax({
            url: "/typesalles",
            type: "post",
            data:{
                libTypeSalle: libTypeSalle,
                prixTypeSalle: prixTypeSalle,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();typeSalleModif
                alert('type salle créé avec succès !');
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

$('#typeSalleModif').change(function(e){
    let idTypeSalle = $('#typeSalleModif').val()

    $.ajax({
        url: "/edittypesalle",
        type: "post",
        data:{
            idTypeSalle: idTypeSalle,
            _token: $('input[name="_token"]').val(),
        },
        success: function(result){
            $('#libTypeSalle').val(result['typeSalle']['libTypeSalle'])
            $('#prixTypeSalle').val(result['typeSalle']['prixTypeSalle'])
        },
        error: function(error){
            console.log(error)

        }
    });

})

$('#btnModif').click(function(){
    let libTypeSalle = $('#libTypeSalle').val()
    let prixTypeSalle = $('#prixTypeSalle').val()

    let idTypeSalle = $('#typeSalleModif').val()


    if(libTypeSalle && prixTypeSalle && idTypeSalle){
        $.ajax({
            url: `/typesalles/${idTypeSalle}`,
            type: "patch",
            data:{
                libTypeSalle: libTypeSalle,
                prixTypeSalle: prixTypeSalle,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
                alert('Type salle modifié avec succès !');
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
    let idTypeSalle = $('#typeSalleModif').val()

    if(!idTypeSalle){
        alert('Sélectionne un tarif à supprimer !');
        return;
    }

    // désactive le bouton pour éviter double clic
    $(this).prop('disabled', true);

    $.ajax({
        url: `/typesalles/${idTypeSalle}`,
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

