<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Inicia Sesion y organiza tu negocio</p>

    <nav class="auth__tabs">
        <button type="button" class="actual" data-login="1">Administrador</button>
        <button type="button" data-login="2">Empleado</button>
    </nav>

    <?php
    require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <div class="auth__grid" id="login-1">
        <form action="/login" class="formulario" method="POST">
            <div class="formulario__campo">
                <label for="email" class="formulario__label">Email</label>
                <input type="email" class="formulario__input" placeholder="Tu Email" id="email" name="email">
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="password">Password</label>
                <input type="password" class="formulario__input" placeholder="Tu password" id="password" name="password">
            </div>

            <input type="submit" class="formulario__submit" value="Inisiar Sesion">


        </form>

        <div class="acciones">
            <a href="/registro" class="acciones__enlace">¿Aun no tienes Cuenta? Obtener una</a>
            <a href="/olvide" class="acciones__enlace">¿Olvidaste tu Password?</a>

        </div>
    </div>

    <div class="auth__grid" id="login-2">
        <form action="/loginEmpleado" class="formulario" method="POST">
            <div class="formulario__campo">
                <label for="nombre" class="formulario__label">Nombre</label>
                <input type="nombre" class="formulario__input" placeholder="Nombre" id="nombre" name="nombre">
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="password">Password</label>
                <input type="password" class="formulario__input" placeholder="Tu Numero de Telefono" id="password" name="telefono">
            </div>

            <input type="submit" class="formulario__submit" value="Inisiar Sesion">


        </form>

        <div class="acciones">
            <a href="/registro" class="acciones__enlace">¿Aun no tienes Cuenta? Obtener una</a>
            <a href="/olvide" class="acciones__enlace">¿Olvidaste tu Password?</a>

        </div>
    </div>

</main>