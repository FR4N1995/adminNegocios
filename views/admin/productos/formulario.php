<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion del Producto</legend>
    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input type="text" value="<?php echo $productos->nombre ?? ''?>" class="formulario__input" id="nombre" name="nombre" placeholder="Nombre del Producto">
    </div>
    <div class="formulario__campo">
        <label for="precio" class="formulario__label">Precio</label>
        <input type="number" value="<?php echo $productos->precio ?? '' ?>" class="formulario__input" id="precio" name="precio" placeholder="Precio del Producto">
    </div>
    <div class="formulario__campo">
        <label for="disponible" class="formulario__label">Introduce la cantidad Disponible</label>
        <input type="number" value="<?php echo $productos->disponible ?? '' ?>" class="formulario__input" id="disponible" name="disponible" placeholder="Ejemplo: 30">
    </div>
    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen</label>
        <input type="file" class="formulario__input formulario__input--file" id="imagen" name="imagen">
    </div>
    <!-- si existe -->
    <?php if (isset($productos->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual</p>

        <div class="formulario__imagen">

        <picture>
            <source srcset="<?php echo 'http://localhost:3000'. '/img/products/' . $productos->imagen; ?>.webp" type="image/webp">
            <source srcset="<?php echo 'http://localhost:3000'. '/img/products/' . $productos->imagen; ?>.png" type="image/png">
            <img src="<?php echo 'http://localhost:3000'. '/img/products/' . $productos->imagen; ?>.png" alt="imagen Ponente">
        </picture>
            
        </div>

    <?php } ?>

   

</fieldset>