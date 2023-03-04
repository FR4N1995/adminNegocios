<header class="header">

    <div class="header__contenedor">
        <!--      
            <div class="">
                <a href="/">
                    <img class="header__logo" src="/build/img/avalos murillo-blanco.png" alt="logo">
                </a>
                
            </div> -->

        <nav class="header__navegacion">
            <?php if (isAuth() && isSuperAdmin()) { ?>
                <a href="/superadmin/dashboard" class="header__enlace">Administrador</a>
                <form method="POST" action="/logout" class="header__form">
                    <input type="submit" value="Cerrar Sesion" class="header__submit">
                </form>


            <?php } elseif (isAuth()) { ?>
                <a href="/admin/dashboard" class="header__enlace">Administrador</a>
                <form method="POST" action="/logout" class="header__form">
                    <input type="submit" value="Cerrar Sesion" class="header__submit">
                </form>
            <?php } else { ?>
                <a href="/login" class="header__enlace">Iniciar Sesion
                <?php } ?>
        </nav>



    </div>
    <div class="header__contenido">
        <p class="header__texto">Organiza tu negocio y obten mejores resultados en muy poco tiempo</p>
        <a href="/registro" class="header__boton">Empieza Ya!</a>
    </div>

</header>

<div class="barra">
    <div class="barra__contenido">
        <a href="/">
            <img class="header__logo" src="/build/img/avalos murillo-blanco.png" alt="logo">
        </a>
        <nav>
            <a href="/paquetes" class="navegacion__enlace <?php echo pagina_actual('/paquetes') ? 'navegacion__enlace--actual' : ''; ?>">Paquetes</a>
            <a href="/preguntasFrecuentes" class="navegacion__enlace <?php echo pagina_actual('/preguntasFrecuentes') ? 'navegacion__enlace--actual' : ''; ?>">Preguntas Frecuentes</a>
            <a href="/blog" class="navegacion__enlace <?php echo pagina_actual('/blog') ? 'navegacion__enlace--actual' : ''; ?>">Blog</a>
        </nav>
    </div>
</div>
<!-- barra para dispositivos moviles -->
<div class="movil">
    <div class="movil__contenedor">
        <a href="/" class="movil__logo">
            <img class="movil__logo" src="/build/img/avalos murillo-blanco.png" alt="logo">
        </a>


        <div class="movil__barras">
            <img src="/build/img/barras.svg" alt="barras menu movil" id="mobile-menu">
        </div>
    </div>
</div>
<nav class="movil__navegacion">
    <a href="/paquetes" class="navegacion__enlace <?php echo pagina_actual('/paquetes') ? 'navegacion__enlace--actual' : ''; ?>">Paquetes</a>
    <a href="/instrucciones" class="navegacion__enlace <?php echo pagina_actual('/instrucciones') ? 'navegacion__enlace--actual' : ''; ?>">Preguntas Frecuentes</a>
    <a href="/instrucciones" class="navegacion__enlace <?php echo pagina_actual('/blog') ? 'navegacion__enlace--actual' : ''; ?>">Blog</a>

</nav>