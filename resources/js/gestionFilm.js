

$('#btnAjt').click(function(){
    let titreFilm = $('#titreFilm').val()
    let descFilm = $('#descFilm').val()
    let dateSortieFilm = $('#dateSortieFilm').val()
    let dureeFilm = $('#dureeFilm').val()
    let posterFilm = $('#posterFilm').val()
    let idGenre = $('#idGenre').val()

    if(titreFilm && descFilm && dateSortieFilm && dureeFilm && posterFilm && idGenre){
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
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
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
            console.log(result['film'])
            $('#titreFilm').val(result['film']['titreFilm'])
            $('#descFilm').val(result['film']['descFilm'])
            $('#dateSortieFilm').val(result['film']['dateSortieFilm'])
            $('#dureeFilm').val(result['film']['dureeFilm'])
            $('#posterFilm').val(result['film']['posterFilm'])
            $('#idGenre').val(result['film']['idGenre'])
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

    let idFilm = $('#filmModif').val();

    if(titreFilm && descFilm && dateSortieFilm && dureeFilm && posterFilm && idGenre){
        $.ajax({
            url: `/films/${idFilm}`,
            type: "patch",
            data:{
                titreFilm: titreFilm,
                descFilm: descFilm,
                dateSortieFilm: dateSortieFilm,
                dureeFilm: dureeFilm,
                posterFilm: posterFilm,
                idGenre: idGenre,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
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

        },
        error: function(error){
            console.log(error);
        },
        complete: function(){
            $('#btnSuppr').prop('disabled', false); // réactive le bouton
        }
    });
});

