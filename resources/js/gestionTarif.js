
$('#btnAjt').click(function(){
    let libTarif = $('#libTarif').val()
    let prixTarif = $('#prixTarif').val()


    if(libTarif && prixTarif){
        $.ajax({
            url: "/tarifs",
            type: "POST",
            data:{
                libTarif: libTarif,
                prixTarif: prixTarif,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
                alert('Tarif créé avec succès !');
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

$('#tarifModif').change(function(e){
    let idTarif = $('#tarifModif').val()
    if(!idTarif){
        return;
    }

    $.ajax({
        url: "/editTarif",
        type: "post",
        global:false,
        data:{
            idTarif: idTarif,
            _token: $('input[name="_token"]').val(),
        },
        success: function(result){
            $('#libTarif').val(result['tarif']['libTarif'])
            $('#prixTarif').val(result['tarif']['prixTarif'])
        },
        error: function(error){
            console.log(error)

        }
    });

})

$('#btnModif').click(function(){
    let libTarif = $('#libTarif').val()
    let prixTarif = $('#prixTarif').val()

    let idTarif = $('#tarifModif').val()


    if(libTarif && prixTarif){
        $.ajax({
            url: `/tarifs/${idTarif}`,
            type: "patch",
            data:{
                libTarif: libTarif,
                prixTarif: prixTarif,
                _token: $('input[name="_token"]').val(),
            },
            success: function(result){
                $('#myForm')[0].reset();
                alert('Tarifs modifié avec succès !');
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
    let idTarif = $('#tarifModif').val()

    if(!idTarif){
        alert('Sélectionne un tarif à supprimer !');
        return;
    }

    // désactive le bouton pour éviter double clic
    $(this).prop('disabled', true);

    $.ajax({
        url: `/tarifs/${idTarif}`,
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

