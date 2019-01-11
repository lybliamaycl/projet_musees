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

     jQuery(function($) { 

        // settings
        var $slider = $('.slider'); // class or id of carousel slider
        var $slide = 'li'; // could also use 'img' if you're not using a ul
        var $transition_time = 2000; // 1 second
        var $time_between_slides = 4000; // 4 seconds
      
        function slides(){
          return $slider.find($slide);
        }
      
        slides().fadeOut();
      
        // set active classes
        slides().first().addClass('active');
        slides().first().fadeIn($transition_time);
      
        // auto scroll 
        $interval = setInterval(
          function(){
            var $i = $slider.find($slide + '.active').index();
      
            slides().eq($i).removeClass('active');
            slides().eq($i).fadeOut($transition_time);
      
            if (slides().length == $i + 1) $i = -1; // loop to start
      
            slides().eq($i + 1).fadeIn($transition_time);
            slides().eq($i + 1).addClass('active');
          }
          , $transition_time +  $time_between_slides 
        );
      
      });

})
