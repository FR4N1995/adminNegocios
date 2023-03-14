(function(){

    let productos = [];
    const resumen = document.querySelector('#registro-resumen');
     //let total = 0;
    if (resumen) {
      
        const btnAgregarProducto = document.querySelectorAll('.producto-registro--agregar');
        btnAgregarProducto.forEach( boton => boton.addEventListener('click', seleccionarProducto))
        
        const btnAgregarVenta = document.querySelector('#registro');
        btnAgregarVenta.addEventListener('click', agregarVenta);

        //mandamos llamar la funcion calcular para poder ver el mensaje cuando no hay elementos seleccionados
        calcularVenta();

        function validarDisponibilidad(){

        }
        
        function seleccionarProducto(e){
            //  console.log( e.target.parentElement.querySelector('.producto-registro--input').max);
            //console.log(e.target.parentElement.querySelector('.producto-registro--input').value.trim());
            // Este if es para no permitir añadir mas productos de los disponibles, no permitir numeros negativos ni el campo vacio
            if (parseInt( e.target.parentElement.querySelector('.producto-registro--input').value) > parseInt( e.target.parentElement.querySelector('.producto-registro--input').max ) || parseInt( e.target.parentElement.querySelector('.producto-registro--input').value) <= 0 || e.target.parentElement.querySelector('.producto-registro--input').value.trim() === "") {
                Swal.fire({
                    title: 'Error!',
                    text: 'La cantidad debe ser valida y no debe superar la cantidad Diponible',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
                console.log('La cantidad quie quieres vender es mayor a la que contamos atualmente');
            } else {
                e.target.disabled = true;
                productos = [...productos,{
                        id: e.target.dataset.id,
                        // titulo: e.target.parentElement.querySelector('.producto-registro--nombre').textContent.trim()
                        cantidad: e.target.parentElement.querySelector('.producto-registro--input').value.trim(),
                        nombre: e.target.parentElement.querySelector('.producto-registro--nombre').textContent.trim(),
                        precio: e.target.parentElement.querySelector('p .producto-registro--precio').textContent.trim(),
                        subtotal: e.target.parentElement.querySelector('.producto-registro--input').value.trim() * e.target.parentElement.querySelector('p .producto-registro--precio').textContent.trim()
    
                    }]
                calcularVenta();
                //  console.log(productos);
                // mostrarProductos();
                
            }
 
        }

        function calcularVenta(){
             let total = 0;
            productos.forEach(producto =>{
                total += producto.cantidad * producto.precio;
            });

            
            mostrarProductos(total);
        }

        function mostrarProductos(total=0){

            //limpiar el html
            limpiarProductos();

            if (productos.length > 0) {

                productos.forEach(producto => {
                    const productoDom = document.createElement('DIV');
                    productoDom.classList.add('registro__producto');

                    const infoProducto = document.createElement('DIV');
                    infoProducto.classList.add('registro__infoProducto');

                    const accionProducto = document.createElement('DIV');
                    accionProducto.classList.add('registro__acciones');

                    //nombre del producto
                    const nombreProducto = document.createElement('P')
                    // nombreProducto.textContent = producto.nombre;
                    const spanNombre = document.createElement('SPAN');
                    spanNombre.classList.add('registro__infoProducto-nombre');
                    spanNombre.textContent = producto.nombre;

                    nombreProducto.appendChild(spanNombre);

                    //precio del producto
                    const precioProducto = document.createElement('P');
                    precioProducto.textContent = "Precio: $";
                    const spanPrecio = document.createElement('SPAN');
                    spanPrecio.textContent = producto.precio;

                    precioProducto.appendChild(spanPrecio);

                    //cantidad Producto
                    const cantidadProducto = document.createElement('P');
                    cantidadProducto.textContent = "Cantidad:";
                    const spanCantidad = document.createElement('SPAN');
                    spanCantidad.textContent = producto.cantidad;

                    cantidadProducto.appendChild(spanCantidad);

                    //Subtotal de la compra
                    const subtotalProducto = document.createElement('P');
                    subtotalProducto.textContent = "Subtotal: $";
                    const spanSubtotal = document.createElement('SPAN');
                    spanSubtotal.textContent = producto.subtotal;

                    subtotalProducto.appendChild(spanSubtotal);

                    const botonEliminar = document.createElement('BUTTON');
                    botonEliminar.classList.add('registro__eliminar');
                    botonEliminar.innerHTML = `<i class="fa-solid fa-trash"></i>`;
                    botonEliminar.onclick = function(){
                        eliminarProducto(producto.id);
                    }

                    
                    
                    infoProducto.appendChild(nombreProducto);
                    infoProducto.appendChild(precioProducto);
                    infoProducto.appendChild(cantidadProducto);
                    infoProducto.appendChild(subtotalProducto);

                    accionProducto.appendChild(botonEliminar);

                    productoDom.appendChild(infoProducto);
                    productoDom.appendChild(accionProducto);

                    resumen.appendChild(productoDom);
                });

                const totalProducto = document.createElement('P');
                totalProducto.classList.add('registro__total');
                totalProducto.textContent = "Total:";
                const spanTotal = document.createElement('SPAN');
                spanTotal.textContent = `$${total}`;
                totalProducto.appendChild(spanTotal);

                resumen.appendChild(totalProducto);
                
            }else{
                const noVenta = document.createElement('p');
                noVenta.textContent = "No hay Productos, Añade alguno para la venta"
                noVenta.classList.add('producto-registro--texto');
                resumen.appendChild(noVenta);
            }
        }


        async function agregarVenta(e){
            e.preventDefault();

            const fecha = document.querySelector('#fecha').value;
            const hora = document.querySelector('#hora').value;
            const productosId = productos.map(producto => producto.id);
            // const productosCompletos = [...productos];
            // console.log(productosCompletos);
            const  subtotalProducto  = productos.map(producto => parseInt( producto.subtotal));
            const cantidadesProductos = productos.map(producto => parseInt(producto.cantidad));
            if (fecha === '' || hora === '' || productosId.length === 0 || subtotalProducto === 0) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Minimo debes seleccionar un Producto con una Cantidad y la Fecha y hora de la Venta',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }
            //Calculamos el total del arreglo subTotalProducto 
            // const total = subtotalProducto.reduce(
            //     (valora, valorb) => valora + valorb, total
            // );
            const datos = new FormData();
            datos.append('productos_id', productosId);
            datos.append('subtotal', subtotalProducto);
            datos.append('cantidad', cantidadesProductos);
            datos.append('fecha', fecha);
            datos.append('hora', hora);
            

            const url = 'https://admindenegocios.com/admin/ventas';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            })
            const resultado = await respuesta.json();
            if (resultado.resultado) {
                Swal.fire(
                    'Venta Realizada Correctamente',
                    resultado.mensaje,
                    'success'
                ).
                then( ()  => window.location.reload())
            }else{
                Swal.fire({
                    title: 'Error!',
                    text: 'Hubo un Error',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then( () => location.reload())
            }


            // console.log(resultado);
            
        }



    function eliminarProducto(id){
        productos = productos.filter(producto => producto.id !== id);
        const botonAgregar = document.querySelector(`[data-id="${id}"]`);
        botonAgregar.disabled = false;
        // total = total - subtotal
        calcularVenta();
    }


    //funcion para limpiar el HTML
    function limpiarProductos(){
        while(resumen.firstChild){
            resumen.removeChild(resumen.firstChild);
        }

    }

    }



})();
