<h2 class="dashboard__heading"><?php echo $titulo ?></h2>
<p class="dashboard__texto">Selecciona los Productos para la venta</p>

<div class="dashboard__contenedor-boton">
    <!-- <a href="/admin/ventas/totales" class="dashboard__boton">
    <i class="fa-regular fa-floppy-disk"></i>
            Productos vendidos
    </a> -->
    <a href="/admin/ventas/ventas" class="dashboard__boton">
    <i class="fa-regular fa-floppy-disk"></i>
            ventas Totales
    </a>
</div>

<div class="dashboard__contenedor">
    <div class="producto-registro">

        <?php if (!empty($productos)) { ?>
        <!-- Listado de productos -->
        <main class="producto-registro__listado">

        <h3 class="producto-registro__heading--productos">Productos</h3>

        <div class="producto-registro__grid">
             <?php foreach($productos as $producto) {  ?>
                    <div class="producto-registro--contenedor">
                        <div class="producto-registro--informacion">
                            <p class="producto-registro--nombre"><?php echo $producto->nombre ?></p>

                            <div class="producto-registro--imagen">
                                <picture>
                                    <source srcset="<?php __DIR__  ?>/img/products/<?php echo $producto->imagen; ?>.webp" type="image/webp">
                                    <source srcset="<?php __DIR__  ?>/img/products/<?php echo $producto->imagen; ?>.png" type="image/png">
                                    <img class="producto-registro--autor" loading="lazy" width="200" height="300" src="<?php __DIR__  ?>/img/products/<?php echo $evento->ponente->imagen; ?>.png" alt="imagen Ponente">
                                </picture>
                            </div>
                            <p class="producto-registro--precio">$<span class="producto-registro--precio"><?php echo $producto->precio ?></span></p>
                            <div class="producto-registro--formulario">
                            <label for="cantidad" class="producto-registro--label">Cantidad</label>
                            <input type="number" value="" min="1" max="<?php echo $producto->disponible  ?>" class="producto-registro--input" id="cantidad" name="cantidad" placeholder="Ejemplo:1">
                            </div>
                            <button type="button" <?php echo ($producto->disponible === '0') ? 'disabled' : ''; ?> data-id="<?php echo $producto->id ?>" class="producto-registro--agregar"><?php echo ($producto->disponible === '0') ? 'Agotado': $producto->disponible . " Disponibles"?></button>
                        </div>
                    </div>
            <?php }  ?>
        </div>

        </main>

        <?php } else {?>
            <h2 class="producto-registro--sinproducto">Aún no hay productos, empieza creando uno</h2>
       <?php } ?>

        <!-- Resumen de la venta de los productos -->
        <aside class="registro">

        <h2 class="registro__heading">Resumen de la Venta</h2>

        <div id="registro-resumen" class="registro__resumen"></div>

        <div class="">
            <div class="registro--formulario">
                <label for="fecha" class="registro--label">Fecha</label>
                <input type="date" value=""  class="registro--input" id="fecha" name="fecha">
            </div>
            <div class="registro--formulario">
                <label for="hora" class="registro--label-hora">Hora</label>
                <input type="time" value=""  class="registro--input" id="hora" name="hora">
            </div>
        </div>

        <form  id="registro" class="formulario">
                <div class="formulario__campo">
                    <input type="submit" class="formulario__submit formulario__submit--full <?php echo ($bandera===false) ? 'dashboard__deshabilitar' : '';?>" value="Registrar Venta">
                </div>
         </form>
        

        </aside>

    </div>
</div>