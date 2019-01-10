$(document).ready( function(){


    $('#carte').load( function(){
        var svg = carte.contentDocument;
        var AllDeps = svg.querySelectorAll('.deps');
        var allDepsArray = Array.prototype.slice.call(AllDeps);
  
        allDepsArray.forEach(dep => {
            dep.addEventListener('click', function(){
                var idDep = dep.getAttribute('data-id');
                console.log(idDep);
            })
        });
    })

})