<header class="dashboard__header">
    <div class="dashboard__header-grid">
        <div class="dashboard__usuario">
        
        <a href="/">
            
            <img class="dashboard__logo" src="/build/img/avalos murillo-blanco.png" alt="">
            
        </a>
        <p><i class="fa-solid fa-user"></i><?php echo $nombre ?></p>

        </div>     
        <nav class="dashboard__nav">  
            <form method="POST" action="/logout" class="dhasboard__form">
            
                 <input type="submit" value="Cerrar Sesion" class="dashboard__submit--logout">
            </form>
        </nav>
    </div>

    <!-- barra par dispositivos mobiles -->
    <div class="dashboard__barra-mobile">
            <div class="dashboard__usuario">
            <a href="/">
            
            <img class="dashboard__logo" src="/build/img/avalos murillo-blanco.png" alt="">
            
        </a>
            <p><i class="fa-solid fa-user"></i><?php echo $nombre; ?></p>
            </div>
        <div class="dashboard__menu">
            <img src="/build/img/barras.svg" alt="barras menu movil" id="mobile-menu">
        </div>
    </div>
</header>