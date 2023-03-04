(function(){
    //seleccionamos el boton ver
    const verCitas = document.querySelectorAll('#vercita');
    if (verCitas) {

        verCitas.forEach(verCita => {
            verCita.addEventListener('click', leerCitas);
        });
    
        async function leerCitas(e){
            const idCita = e.target.value;
            try {
                const url = `/api/citas?id=${idCita}`;
                const respuesta = await fetch(url);
                const resultado = await respuesta.json();
                // console.log(resultado);
                mostrarCitas({...resultado});
            } catch (error) {
                console.log(error);
            }
           
        }

        const estados = {
            0: 'pendiente',
            1: 'completada'
        }

        function mostrarCitas(cita){
            const modalCitas = document.createElement('DIV');
            modalCitas.classList.add('modal');

            modalCitas.innerHTML=`
            <form class="contenedorModal"> 
                <h1>Informacion del cliente</h1>
                <div class="campo"> 
                    <p class="modal__nombre">Cliente: <span> ${cita.nombre} ${cita.apellido}</span></p>
                    <p class="modal__precio">Fecha: <span> ${cita.fecha}</span></p>
                    <p class="modal__disponible">Hora: <span> ${cita.hora}</span></p>
                    <p class="modal__asunto">Asunto: <span> ${cita.asunto}</span></p>
                    <div class="modal__contenedorEstado">
                    <p class="modal__estado >Estado: <span modal__estado-${estados[cita.estado]}"> ${estados[cita.estado]}</span></p>
                    </div>
                </div>
            
    
                <div class="opciones">
                    <button type="button" class="modal__btncerrar">Cerrar</button>
                </div>
            </form>
         `;

         setTimeout(() => {
            const contenedorModalCitas = document.querySelector('.contenedorModal');
            contenedorModalCitas.classList.add('animar');
         }, 100);
         modalCitas.addEventListener('click', function(evento){
            evento.preventDefault();
            if (evento.target.classList.contains('modal__btncerrar')) {
                const contenedorModalCitas = document.querySelector('.contenedorModal');
                contenedorModalCitas.classList.add('cerrarModal');
                setTimeout(() => {
                    modalCitas.remove();
                }, 500);
            }

         })

        document.querySelector('#contenedorCitas').appendChild(modalCitas);

        }


        
    }
  

})();