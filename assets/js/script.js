$(document).ready( function(){


    $('#carte').load( function(){
        var svg = carte.contentDocument;
        var AllDeps = svg.querySelectorAll('.deps');
        var allDepsArray = Array.prototype.slice.call(AllDeps);

        allDepsArray.forEach(dep => {
            dep.addEventListener('click', function(){
                var idDep = dep.getAttribute('data-id');
                console.log(idDep);

                $.ajax({
                    url: location + '/departement/' + idDep,
                    type: "GET",
                    data: JSON.stringify({ id : idDep}),
                    contentType: 'application/json; charset=utf-8',
                    success: function AjaxSucceeded(result){
                        var json = result;
                        console.log(json);
                        arr = JSON.parse(json);
                        console.log(arr);

                        var museeList = "";
                        for(i = 0; i < arr.length; i++){
                            var musee = (arr[i]);
                            museeList += '<article class="musee p20 h250p"><img src="./assets/img/mainpage.jpg" width="100%"><a class="c1" href="' + location + 'musee/' + arr[i].ID_MUSEE + '">'  + musee.MUS_NOM + "</a>" + "</br>" + musee.MUS_VILLE + "</article>";
                        }
                        // Affichage dans #resultat
                        $('#resultat').html(museeList);
                    },
                    error: function AjaxFailed(result) {
                        console.log("erreur ajax");
                        console.log(result.status + ' ' + result.statusText);
                    },
                }) // Fin ajax
            })
        });
    })

})
