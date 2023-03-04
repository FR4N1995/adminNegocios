<fieldset class="formulario__fieldset">
    <legendc class="formulario__legend">Informacion del empleado</legend>
        <div class="formulario__campo">
            <label for="nombre" class="formulario__label">Nombre</label>
            <input type="text" value="<?php echo $empleados->nombre ?? '' ?>" class="formulario__input" id="nombre" name="nombre" placeholder="nombre Ponente">
        </div>
        <div class="formulario__campo">
            <label for="apellido" class="formulario__label">Apellido</label>
            <input type="text" value="<?php echo $empleados->apellido ?? '' ?>" class="formulario__input" id="apellido" name="apellido" placeholder="nombre Ponente">
        </div>
        <div class="formulario__campo">
            <label for="telefono" class="formulario__label">Tel (celular)</label>
            <input type="tel" value="<?php echo $empleados->telefono ?? '' ?>" class="formulario__input" id="telefono" name="telefono" placeholder="Telefono del empleado">
        </div>
        <div class="formulario__campo">
            <label for="cargo" class="formulario__label">selecciona Cargo del Empleado</label>
            <select type="text" class="formulario__input" id="cargo" name="admin">
                <option value="0">--Seleccionar--</option>
                <!-- Aqui se podria meter una categoria de los distintos empleados y de sus respectivos cargos -->
                <option <?php echo ($empleados->admin) === '1' ? 'selected' : '' ?> value="1">Administrador</option>
                <option <?php echo ($empleados->admin) === '0' ? 'selected' : '' ?> value="0">Empleado</option>
            </select>
        </div>

</fieldset>