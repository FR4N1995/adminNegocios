<section class="home">
    <!-- slider es la clase que utilizo para hacer referencia en el javascript -->
    <div class="home__grid slider swiper">
        <!-- el swiper-wrapper es necesario para que funcione -->
        <div class="swiper-wrapper">
            <!-- el swiper-slide es necesario para que funcione -->
            <div data-aos="<?php aos_animacion(); ?>" class="home__icono swiper-slide">
                <!-- <img src="/build/img/icono1.svg" alt=""> -->
                <i class="fa-solid fa-lock fa-5x"></i>
                <h3>Seguridad</h3>
                <p>Protege tus datos y operaciones de cualquier persona</p>
            </div>

            <div data-aos="<?php aos_animacion(); ?>" class="home__icono swiper-slide">
                <!-- <img src="/build/img/icono2.svg" alt=""> -->
                <i class="fa-solid fa-mobile-screen fa-5x"></i>
                <h3>Disponibilidad</h3>
                <p>Acceso desde cualquier sitio con Internet</p>
            </div>

            <div data-aos="<?php aos_animacion(); ?>" class="home__icono swiper-slide">
                <!-- <img src="/build/img/icono3.svg" alt=""> -->
                <i class="fa-solid fa-business-time fa-5x"></i>
                <h3>Tiempo</h3>
                <p>Ahorra Tiempo Realizando acciones al alcance de un click</p>
            </div>
            <div data-aos="<?php aos_animacion(); ?>" class="home__icono swiper-slide">
                <!-- <img src="/build/img/icono3.svg" alt=""> -->
                <i class="fa-solid fa-sitemap fa-5x"></i>
                <h3>Organizacion</h3>
                <p>Obten una agilizacion de todos los procesos que realizas dia con dia</p>
            </div>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>


</section>