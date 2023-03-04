(function(){
//primero seleccionamos el boton de ver
const verProductos = document.querySelectorAll('#ver');

if (verProductos) {

    verProductos.forEach(verProducto => {
        verProducto.addEventListener('click', leerProductos);
   })
   
   async function leerProductos(e){
       //  console.log(e.target.value);
       const idProducto = e.target.value;
       try {
           const url  = `/api/productos?id=${idProducto}`;
           const respuesta = await fetch(url);
           const resultado = await respuesta.json();
           // console.log(resultado);
           mostrarProductos({...resultado});
       } catch (error) {
           
       }
   }
   function mostrarProductos(producto){
       // console.log('desde la funcion');
       const modal = document.createElement('DIV');
       modal.classList.add('modal');
       // C:\laragon\www\administadorNegocios\public\img\products
       modal.innerHTML=`
       <form class="contenedorModal"> 
           <div class="campo"> 
               <picture>
                   <source class="modal__imagen" srcset="http://localhost:3000/img/products/${producto.imagen}.webp" type="image/webp">
                   <source class="modal__imagen" srcset="http://localhost:3000/img/products/${producto.imagen}.png" type="image/png">
                   <img class="modal__imagen" src="http://localhost:3000/img/products/${producto.imagen}.png" alt="imagen Ponente">
               </picture>
           <div>
   
           <div class="campo"> 
           
               <p class="modal__nombre">Nombre del Producto: <span> ${producto.nombre}</span></p>
               <p class="modal__precio">Precio del Producto: <span>$${producto.precio}</span></p>
               <p class="modal__disponible">Cantidad disponible: <span> ${producto.disponible}</span></p>
   
           </div>
           
   
           <div class="opciones">
                <button type="button" class="modal__btncerrar">Cerrar</button>
           </div>
       </form>
       `;
       setTimeout(() => {
           const contenedorModal = document.querySelector('.contenedorModal');
           contenedorModal.classList.add('animar');
       },100);
       modal.addEventListener('click', function(evento){
           evento.preventDefault();
           if (evento.target.classList.contains('modal__btncerrar')) {
               const contenedorModal = document.querySelector('.contenedorModal');
               contenedorModal.classList.add('cerrarModal');
               setTimeout(() => {
                   modal.remove();
                 }, 500);
           }
       })
       document.querySelector('#contenedorProductos').appendChild(modal);
   }
    
}


})();

