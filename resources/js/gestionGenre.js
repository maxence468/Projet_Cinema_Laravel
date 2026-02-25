
$('#btnAjt').click(function(){
    let libGenre = $('#libGenre').val()

    if(libGenre){
        $.ajax({
            url: "/genres",
            type: "post",
            data:{
                libGenre: libGenre,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
                alert('Genre créé avec succès !');
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

$('#genreModif').change(function(e){
    let idGenre = $('#genreModif').val()

    $.ajax({
        url: "/editGenre",
        type: "post",
        data:{
            idGenre: idGenre,
            _token: $('input[name="_token"]').val(),
        },
        success: function(result){
            console.log(result['film'])
            $('#libGenre').val(result['genre']['libGenre'])
        },
        error: function(error){
            console.log(error)

        }
    });

})

$('#btnModif').click(function(){
    let libGenre = $('#libGenre').val()

    let idGenre = $('#genreModif').val()

    if(libGenre){
        $.ajax({
            url: `/genres/${idGenre}`,
            type: "patch",
            data:{
                libGenre: libGenre,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
                alert('Genre modifié avec succès !');
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
    let idGenre = $('#genreModif').val()

    if(!idGenre){
        alert('Sélectionne un Genre à supprimer !');
        return;
    }

    // désactive le bouton pour éviter double clic
    $(this).prop('disabled', true);

    $.ajax({
        url: `/genres/${idGenre}`,
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

