
$('#btnAjt').click(function(){
    let nomCinema = $('#nomCinema').val()
    let adresseCinema = $('#adresseCinema').val()
    let codePostale = $('#codePostale').val()

    if(nomCinema && adresseCinema && codePostale){
        $.ajax({
            url: "/cinemas",
            type: "post",
            data:{
                nomCinema: nomCinema,
                adresseCinema: adresseCinema,
                codePostale: codePostale,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
                alert('Cinema créé avec succès !');
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

$('#cinemaModif').change(function(e){
    let idCinema = $('#cinemaModif').val()

    $.ajax({
        url: "/editCinema",
        type: "post",
        data:{
            idCinema: idCinema,
            _token: $('input[name="_token"]').val(),
        },
        success: function(result){
            $('#nomCinema').val(result['cinema']['nomCinema'])
            $('#adresseCinema').val(result['cinema']['adresseCinema'])
            $('#codePostale').val(result['cinema']['codePostale'])
        },
        error: function(error){
            console.log(error)

        }
    });

})

$('#btnModif').click(function(){
    let nomCinema = $('#nomCinema').val()
    let adresseCinema = $('#adresseCinema').val()
    let codePostale = $('#codePostale').val()

    let idCinema = $('#cinemaModif').val()


    if(nomCinema && adresseCinema && codePostale){
        $.ajax({
            url: `/cinemas/${idCinema}`,
            type: "patch",
            data:{
                nomCinema: nomCinema,
                adresseCinema: adresseCinema,
                codePostale: codePostale,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
                alert('Cinema modifié avec succès !');
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
    let idCinema = $('#cinemaModif').val()

    if(!idCinema){
        alert('Sélectionne un cinema à supprimer !');
        return;
    }

    // désactive le bouton pour éviter double clic
    $(this).prop('disabled', true);

    $.ajax({
        url: `/cinemas/${idCinema}`,
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

