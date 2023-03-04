<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion para la Cita/Compromiso</legend>
    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">nombre del Cliente</label>
        <input type="text" value="<?php echo trim($citas->nombre ?? '')?>" class="formulario__input" id="nombre" name="nombre" placeholder="Ejemplo: Luis">
    </div>
    <div class="formulario__campo">
        <label for="apellido" class="formulario__label">Apellido del Cliente</label>
        <input type="text" value="<?php echo trim($citas->apellido ?? '') ?>" class="formulario__input" id="apellido" name="apellido" placeholder="Ejemplo: lopez">
    </div>
    <div class="formulario__campo">
        <label class="formulario__label" for="asunto">Asunto de la Cita</label>
        <textarea  class="formulario__textarea" name="asunto" id="asunto" rows="3"><?php echo trim($citas->asunto ?? '');?></textarea>
    </div>
    <div class="formulario__campo">
        <label for="fecha" class="formulario__label">Fecha</label>
        <input type="date" value="<?php echo $citas->fecha ?? '' ?>" class="formulario__input" id="fecha" name="fecha" placeholder="Precio del Producto">
    </div>
    <div class="formulario__campo">
        <label for="hora" class="formulario__label">Hora</label>
        <input type="time" value="<?php echo $citas->hora ?? '' ?>" class="formulario__input" id="hora" name="hora" placeholder="Precio del Producto">
    </div>
</fieldset>