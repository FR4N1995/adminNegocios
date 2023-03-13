(function (){
    let login = 1;

    document.addEventListener('DOMContentLoaded', function(){
        mostrarlogin();
        navegacion();
    });


    function mostrarlogin(){

        const beforeSection = document.querySelector('.mostrarLogin');
        if (beforeSection) {
            beforeSection.classList.remove('mostrarLogin');
        }

        const seccionLogin = document.querySelector(`#login-${login}`);
        seccionLogin.classList.add('mostrarLogin');

        const tabuladorBefore = document.querySelector('.actual');
        if (tabuladorBefore) {
            tabuladorBefore.classList.remove('actual');
        }

        const tabuladores = document.querySelector(`[data-login="${login}"]`);
        tabuladores.classList.add('actual');
    }


    function navegacion(){
        const navsBtn = document.querySelectorAll('.auth__tabs button');

        navsBtn.forEach( boton => {
            boton.addEventListener('click', function(e){
                login = parseInt(e.target.dataset.login);
                //  console.log(login);
                mostrarlogin();
            });
        });
    }

})();