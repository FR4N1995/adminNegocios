<h1 class="dashboard__heading"><?php echo $titulo ?></h1>

<main class="bloques">
    <div class="bloques__grid">
        <div class="bloque">
            <h3 class="bloque__heading">Ultimos registros</h3>
            <?php foreach($lastRegistros as $lastregistro){  ?>
                    <p class="bloque__texto">
                        <?php echo $lastregistro->paquete->nombre; ?>
                    </p>
            <?php } ?>
        </div>
        <div class="bloque">
            <h3 class="bloque__heading">Ingresos</h3>
            <p class="bloque__texto--cantidad">$<?php echo $ingresos; ?></p>

        </div>
        <div class="bloque">
            <h3 class="bloque__heading">trabajando en ello</h3>
        </div>
        <div class="bloque">
            <h3 class="bloque__heading">Trabajando en ello</h3>
        </div>
    </div>
</main>