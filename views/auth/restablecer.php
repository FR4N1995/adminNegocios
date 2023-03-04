<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Coloca Tu nueva Contraseña</p>

    <?php
        require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <?php if($tokenValido) {?>
        <form method="POST"  class="formulario">
            <div class="formulario__campo">
                <label class="formulario__label" for="password">Nuevo Password</label>
                <input type="password" class="formulario__input" placeholder="Tu nuevo password" id="password" name="password">
            </div>
            
            <input type="submit" class="formulario__submit" value="Guardar Password">

        </form>
    <?php } ?>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes Cuenta? Iniciar Sesion</a>
        <a href="/registro" class="acciones__enlace">¿Aun no tienes Cuenta? Obtener una</a>

    </div>


</main>