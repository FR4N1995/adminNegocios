<aside class="dashboard__sidebar">

    <div class="dashboard__sidebar-contenedor">
        <a href="/">
            <img class="dashboard__logo" src="/build/img/avalos murillo-blanco.png" alt="">
        </a>

        <div class="dashboard__sidebar-cerrar-menu">
            <h1 id="cerrar-menu"><i class="fa-regular fa-circle-xmark"></i></h1>
        </div>

    </div>
    <?php if ($admin === '1') {  ?>
        <nav class="dashboard__menu">
            <a href="/admin/dashboard" class="dashboard__enlace <?php echo pagina_actual('/dashboard') ? 'dashboard__enlace--actual' : ''; ?>">
                <i class="fa-solid fa-house dashboard__icono"></i>
                <span class="dashboard__menu-texto">Inicio</span>
            </a>
            <a href="/admin/productos" class="dashboard__enlace <?php echo pagina_actual('/productos') ? 'dashboard__enlace--actual' : ''; ?>">
                <i class="fa-solid fa-shirt dashboard__icono"></i>
                <span class="dashboard__menu-texto">Productos</span>
            </a>
            <a href="/admin/citas" class="dashboard__enlace <?php echo pagina_actual('/citas') ? 'dashboard__enlace--actual' : ''; ?>">
                <i class="fa-solid fa-calendar dashboard__icono"></i>
                <span class="dashboard__menu-texto">Citas</span>
            </a>
            <a href="/admin/ventas" class="dashboard__enlace <?php echo pagina_actual('/ventas') ? 'dashboard__enlace--actual' : ''; ?>">
                <i class="fa-solid fa-cash-register dashboard__icono"></i>
                <span class="dashboard__menu-texto">Ventas</span>
            </a>
            <a href="/admin/graficas" class="dashboard__enlace <?php echo pagina_actual('/graficas') ? 'dashboard__enlace--actual' : ''; ?>">
                <i class="fa-solid fa-chart-simple dashboard__icono"></i>
                <span class="dashboard__menu-texto">Graficas</span>
            </a>
            <a href="/admin/usuarios" class="dashboard__enlace <?php echo pagina_actual('/usuarios') ? 'dashboard__enlace--actual' : ''; ?>">
                <i class="fa-solid fa-users dashboard__icono"></i>
                <span class="dashboard__menu-texto">Empleados</span>
            </a>
            <a href="/admin/corte" class="dashboard__enlace <?php echo pagina_actual('/corte') ? 'dashboard__enlace--actual' : ''; ?>">
                <i class="fa-solid fa-scissors dashboard__icono"></i>
                <span class="dashboard__menu-texto">Corte</span>
            </a>
        </nav>
    <?php } elseif ($superAdmin === '1') {  ?>
        <nav class="dashboard__menu">
            <a href="/superadmin/dashboard" class="dashboard__enlace <?php echo pagina_actual('/dashboard') ? 'dashboard__enlace--actual' : ''; ?>">
                <i class="fa-solid fa-house dashboard__icono"></i>
                <span class="dashboard__menu-texto">Inicio</span>
            </a>
            <a href="/superadmin/usuariosadmin" class="dashboard__enlace <?php echo pagina_actual('/usuariosadmin') ? 'dashboard__enlace--actual' : ''; ?>">
                <i class="fa-solid fa-users dashboard__icono"></i>

                <span class="dashboard__menu-texto">Usuarios</span>
            </a>
            <a href="/superadmin/registrados" class="dashboard__enlace <?php echo pagina_actual('/registrados') ? 'dashboard__enlace--actual' : ''; ?>">
                <i class="fa-solid fa-users dashboard__icono"></i>
                <span class="dashboard__menu-texto">Registrados</span>
            </a>
        </nav>
    <?php } else {  ?>
        <nav class="dashboard__menu">
            <a href="/admin/dashboard" class="dashboard__enlace <?php echo pagina_actual('/dashboard') ? 'dashboard__enlace--actual' : ''; ?>">
                <i class="fa-solid fa-house dashboard__icono"></i>
                <span class="dashboard__menu-texto">Inicio</span>
            </a>
            <a href="/admin/citas" class="dashboard__enlace <?php echo pagina_actual('/citas') ? 'dashboard__enlace--actual' : ''; ?>">
                <i class="fa-solid fa-calendar dashboard__icono"></i>
                <span class="dashboard__menu-texto">Citas</span>
            </a>
            <a href="/admin/ventas" class="dashboard__enlace <?php echo pagina_actual('/ventas') ? 'dashboard__enlace--actual' : ''; ?>">
                <i class="fa-solid fa-cash-register dashboard__icono"></i>
                <span class="dashboard__menu-texto">Ventas</span>
            </a>
            <a href="/admin/graficas" class="dashboard__enlace <?php echo pagina_actual('/graficas') ? 'dashboard__enlace--actual' : ''; ?>">
                <i class="fa-solid fa-chart-simple dashboard__icono"></i>
                <span class="dashboard__menu-texto">Graficas</span>
            </a>
            <a href="/admin/corte" class="dashboard__enlace <?php echo pagina_actual('/corte') ? 'dashboard__enlace--actual' : ''; ?>">
                <i class="fa-solid fa-scissors dashboard__icono"></i>
                <span class="dashboard__menu-texto">Corte</span>
            </a>

        </nav>
    <?php } ?>


    <div class="dashboard__cerrarsesion-mobile">
        <!-- <a href="/logout" class="dashboard__mobile-btncerrarsesion">Cerrar Sesion</a> -->
            <form method="POST" action="/logout" class="header__form">
                    <input type="submit" value="Cerrar Sesion" class="dashboard__mobile-btncerrarsesion">
            </form>
    </div>

</aside>