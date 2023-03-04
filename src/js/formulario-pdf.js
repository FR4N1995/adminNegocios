(function(){

    const btnpdf = document.querySelector('#pdf');
    const formulariopdf = document.querySelector('.dashboard__formulariopdf');
    if (btnpdf) {
        // alert('hola');
         btnpdf.addEventListener('click', validacionFormulario);
    }

    function validacionFormulario(e){
         e.preventDefault();
        if(formulariopdf.classList.contains('show')){
            formulariopdf.classList.remove('show')
        } else{
            formulariopdf.classList.add('show');
        }
      
 }

    


})();