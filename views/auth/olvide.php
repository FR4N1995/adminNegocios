<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Recupera tu acceso</p>

    <?php
        require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form method="POST" action="/olvide" class="formulario">
            <div class="formulario__campo">
                <label class="formulario__label" for="email">Email</label>
                <input type="email" class="formulario__input" placeholder="Tu Email" id="email" name="email">
            </div>
            
            <input type="submit" class="formulario__submit" value="Enviar Instrucciones">

    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes Cuenta? Iniciar Sesion</a>
        <a href="/registro" class="acciones__enlace">¿Aun no tienes Cuenta? Obtener una</a>

    </div>


</main>