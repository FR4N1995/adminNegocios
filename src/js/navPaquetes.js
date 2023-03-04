(function(){
let paquetes = 1;
document.addEventListener('DOMContentLoaded', function(){
    mostrarSeccion();   
    tabs();
});

function mostrarSeccion(){
    
    const seccionAnterior = document.querySelector('.mostrarpaquetes');
    if (seccionAnterior) {
        seccionAnterior.classList.remove('mostrarpaquetes');
    }

    

    const seccion = document.querySelector(`#paquetes-${paquetes}`)
    seccion.classList.add('mostrarpaquetes');

    const tabAnterior = document.querySelector('.actual');
    if (tabAnterior) {
        tabAnterior.classList.remove('actual');
    }

    const tab = document.querySelector(`[data-paquetes="${paquetes}"]`);
    tab.classList.add('actual');
}


function tabs(){
    const botones = document.querySelectorAll('.paquetes__tabs button');
    botones.forEach( boton => {
        boton.addEventListener('click', function(evento){
            paquetes = parseInt(evento.target.dataset.paquetes)
             console.log(paquetes);
            
            mostrarSeccion();

            // if (paquetes === 1) {
                
            // }
        });
    });
}


})();