(function(){
    const navegacion = document.querySelector('.movil__navegacion');

    document.addEventListener('DOMContentLoaded', function(){
        movileMenuHome();
        
    });
    function movileMenuHome(){
        const mobileMenu = document.querySelector('.movil__barras');
        mobileMenu.addEventListener('click', navegacionResponsive);
    }
    
    function navegacionResponsive(){
       
    
        if(navegacion.classList.contains('show')){
            navegacion.classList.remove('show')
        } else{
            navegacion.classList.add('show');
        }
    
    }

    window.addEventListener('resize', function(){
        const anchoPantalla = document.body.clientWidth;
        if (anchoPantalla >= 768) {
            navegacion.classList.remove('show')
        }
    })


})();