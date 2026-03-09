$(document).ajaxSuccess(function(event, xhr, settings) {
    updateAllSelect();
    console.log('requete ajax reussie')
});

$(document).on('click','#btnSubmitFormGenre', function(e){
    updateSelectGenre();
});

$(document).on('click', '#btnAjtPers',function(e) {
    updateSelectPersonne();
});




function updateAllSelect(){
    updateSelectGenre();
    updateSelectPersonne();
    updateSelectFilm();
    updateSelectCinema();
    updateSelectSalle();
    updateSelectSeance();
    updateSelectTarif();
    updateSelectTypeSalle();
}

function updateSelectGenre(){
    $.ajax({
        url: '/getAllGenre',
        type: "post",
        global: false,
        data:{
            _token: $('input[name="_token"]').val(),
        },
        success: function (result) {
            let select = $('#idGenre, #genreModif');
            select.empty();
            select.append('<option value="">Genres</option>')
            $.each(result['genres'], function(index, genre){
                select.append('<option value="'+ genre.idGenre +'">'+ genre.libGenre +'</option>')
            });
        },
        error: function (error) {
            console.log(error)
        }
    });
}

function updateSelectPersonne(){
    $.ajax({
        url: '/getAllPersonne',
        type: "post",
        global: false,
        data:{
            _token: $('input[name="_token"]').val(),
        },
        success: function (result) {
            let selectReal = $('.idRealisateur');
            let selectScenar = $('.idScenariste');
            let selectActeur = $('.idActeur');
            let selectPersonne = $('#personneModif')

            selectReal.empty();
            selectScenar.empty();
            selectActeur.empty();
            selectPersonne.empty();

            let selects = [selectReal, selectScenar, selectActeur, selectPersonne]

            selectReal.append('<option value="">Réalisateur film</option>')
            selectScenar.append('<option value="">Scénariste film</option>')
            selectActeur.append('<option value="">Acteur film</option>')
            selectPersonne.append('<option value=""></option>')
            $.each(result['personnes'], function(index, personne){
                selects.forEach(function(select){
                    select.append('<option value="'+ personne.idPers +'">'+ personne.nomPers +' - '+ personne.prePers + '</option>')
                });
            });
        },
        error: function (error) {
            console.log(error)
        }
    });
}

function updateSelectFilm(){
    $.ajax({
        url: '/getAllFilm',
        type: "post",
        global: false,
        data:{
            _token: $('input[name="_token"]').val(),
        },
        success: function (result) {
            let select = $('#filmModif');
            select.empty();
            select.append('<option value=""> </option>')
            $.each(result['films'], function(index, film){
                select.append('<option value="'+ film.idFilm +'">'+ film.titreFilm +'</option>')
            });
        },
        error: function (error) {
            console.log(error)
        }
    });
}

function updateSelectCinema(){
    $.ajax({
        url: '/getAllCinema',
        type: "post",
        global: false,
        data:{
            _token: $('input[name="_token"]').val(),
        },
        success: function (result) {
            let select = $('#cinemaModif');
            select.empty();
            select.append('<option value=""> </option>')
            $.each(result['cinemas'], function(index, cinema){
                select.append('<option value="'+ cinema.idCinema +'">'+ cinema.nomCinema +'</option>')
            });
        },
        error: function (error) {
            console.log(error)
        }
    });
}

function updateSelectSalle(){
    $.ajax({
        url: '/getAllSalle',
        type: "post",
        global: false,
        data:{
            _token: $('input[name="_token"]').val(),
        },
        success: function (result) {
            let select = $('#salleModif');
            select.empty();
            select.append('<option value=""> </option>')
            $.each(result['salles'], function(index, salle){
                //modifier avec le numero de salle
                select.append('<option value="'+ salle.idSalle +'">'+ salle.idSalle +'</option>')
            });
        },
        error: function (error) {
            console.log(error)
        }
    });
}

function updateSelectSeance(){
    $.ajax({
        url: '/getAllSeance',
        type: "post",
        global: false,
        data:{
            _token: $('input[name="_token"]').val(),
        },
        success: function (result) {
            let select = $('#seanceModif');
            select.empty();
            select.append('<option value=""> </option>')
            $.each(result['seances'], function(index, seance){
                select.append('<option value="'+ seance.idSeance +'"> Seance '+ seance.heureSeance +', Film : '+ seance.film.titreFilm +', Cinema : '+ seance +'</option>')
            });
        },
        error: function (error) {
            console.log(error)
        }
    });
}

function updateSelectTarif(){
    $.ajax({
        url: '/getAllTarif',
        type: "post",
        global: false,
        data:{
            _token: $('input[name="_token"]').val(),
        },
        success: function (result) {
            let select = $('#tarifModif');
            select.empty();
            select.append('<option value=""> </option>')
            $.each(result['tarifs'], function(index, tarif){
                select.append('<option value="'+ tarif.idTarif +'">'+tarif.libTarif+'</option>')
            });
        },
        error: function (error) {
            console.log(error)
        }
    });
}

function updateSelectTypeSalle(){
    $.ajax({
        url: '/getAllTypeSalle',
        type: "post",
        global: false,
        data:{
            _token: $('input[name="_token"]').val(),
        },
        success: function (result) {
            let select = $('#typeSalleModif');
            select.empty();
            select.append('<option value=""> </option>')
            $.each(result['typeSalles'], function(index, typeSalle){
                select.append('<option value="'+ typeSalle.idTypeSalle +'">'+typeSalle.libTypeSalle+'</option>')
            });
        },
        error: function (error) {
            console.log(error)
        }
    });

}
