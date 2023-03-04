<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Registrate</p>

    <?php
        require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form class="formulario" method="POST" action="/registro">
            <div class="formulario__campo">
                <label class="formulario__label" for="nombre">Nombre</label>
                <input type="nombre" value="<?php echo $usuarios->nombre ?>" class="formulario__input" placeholder="Tu nombre" id="nombre" name="nombre">
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="apellido">Apellido</label>
                <input type="apellido" value="<?php echo $usuarios->apellido  ?>" class="formulario__input" placeholder="Tu apellido" id="apellido" name="apellido">
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="email">Email</label>
                <input type="email" value="<?php echo $usuarios->email ?>" class="formulario__input" placeholder="Tu Email" id="email" name="email">
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="password">Password</label>
                <input type="password"  class="formulario__input" placeholder="Tu password" id="password" name="password">
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="password2">Repetir Password</label>
                <input type="password" class="formulario__input" placeholder="repite tu paswword" id="password2" name="password2">
            </div>

            <input type="submit" class="formulario__submit" value="Registrar">

    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes Cuenta? Inisisar Sesion</a>
        <a href="/olvide" class="acciones__enlace">¿Olvidaste tu Password?</a>

    </div>


</main>