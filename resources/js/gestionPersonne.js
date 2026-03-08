
$('#btnAjt').click(function(){
    let nomPers = $('#nomPers').val()
    let prePers = $('#prePers').val()
    let dateNaissPers = $('#dateNaissPers').val()
    let lieuNaissPers = $('#lieuNaissPers').val()
    let photoPers = $('#photoPers').val()
    let biblio = $('#biblio').val()

    if(nomPers && prePers && dateNaissPers && lieuNaissPers && photoPers && biblio){
        $.ajax({
            url: "/personnes",
            type: "post",
            data:{
                nomPers: nomPers,
                prePers: prePers,
                dateNaissPers: dateNaissPers,
                lieuNaissPers: lieuNaissPers,
                photoPers: photoPers,
                biblio: biblio,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
                alert('Personne créé avec succès !');
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

$('#personneModif').change(function(e){
    let idPers = $('#personneModif').val()

    $.ajax({
        url: "/editPersonne",
        type: "post",
        global:false,
        data:{
            idPers: idPers,
            _token: $('input[name="_token"]').val(),
        },
        success: function(result){
            console.log(result['personne'])
            $('#nomPers').val(result['personne']['nomPers'])
            $('#prePers').val(result['personne']['prePers'])
            $('#dateNaissPers').val(result['personne']['dateNaissPers'])
            $('#lieuNaissPers').val(result['personne']['lieuNaissPers'])
            $('#photoPers').val(result['personne']['photoPers'])
            $('#biblio').val(result['personne']['biblio'])
        },
        error: function(error){
            console.log(error)

        }
    });

})

$('#btnModif').click(function(){
    let nomPers = $('#nomPers').val()
    let prePers = $('#prePers').val()
    let dateNaissPers = $('#dateNaissPers').val()
    let lieuNaissPers = $('#lieuNaissPers').val()
    let photoPers = $('#photoPers').val()
    let biblio = $('#biblio').val()

    let idPers = $('#personneModif').val()

    if(nomPers && prePers && dateNaissPers && lieuNaissPers && photoPers && biblio){
        $.ajax({
            url: `/personnes/${idPers}`,
            type: "patch",
            data:{
                nomPers: nomPers,
                prePers: prePers,
                dateNaissPers: dateNaissPers,
                lieuNaissPers: lieuNaissPers,
                photoPers: photoPers,
                biblio: biblio,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
                alert('Personne modifié avec succès !');
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
    let idPers = $('#personneModif').val()

    if(!idPers){
        alert('Sélectionne une personne à supprimer !');
        return;
    }

    // désactive le bouton pour éviter double clic
    $(this).prop('disabled', true);

    $.ajax({
        url: `/personnes/${idPers}`,
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

