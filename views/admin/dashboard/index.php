<h1 class="dashboard__heading"><?php echo $titulo ?></h1>
<div class="dashboard__datos">
    <div>
        <p>Hola! <span><?php echo $nombre; ?></span></p>
        <p>Fecha Inicio: <span> <?php echo strftime(" %d %B del %G", strtotime($registro->fecha_inicio));?></span></p>
    </div>
    <div>
        <p>Fecha Final: <span><?php echo strftime(" %d %B del %G", strtotime($registro->fecha_final)); ?></span></p>
    </div>

</div>


<!-- mostrar su fecha final donde se le termina el paquete(tratar de que sea formateada) -->

<main class="bloques">
    <div class="bloques__grid">
        <div class="bloque">
            <h3>Productos Menos Disponibles</h3>
            <?php foreach ($prodMenosDisp as $producto) {  ?>
                <p class="bloque__texto">
                    <?php echo $producto->nombre ?> <i class="fa-solid fa-arrow-right"></i> <span><?php echo $producto->disponible . " Disponibles" ?></span>
                </p>
            <?php } ?>
        </div>
        <div class="bloque">
            <h3>Productos Mas Disponibles</h3>
            <?php foreach ($prodMasDisp as $producto) {  ?>
                <p class="bloque__texto">
                    <?php echo $producto->nombre ?> <i class="fa-solid fa-arrow-right"></i> <span><?php echo $producto->disponible . " Disponibles" ?></span>
                </p>
            <?php } ?>
        </div>
        <div class="bloque">
            <h3>Ultimas Ventas Realizadas</h3>
            <?php foreach ($ultimasVentas as $ventas) {  ?>
                <p class="bloque__texto">
                    <?php echo $ventas->nombre ?> <i class="fa-solid fa-arrow-right"></i> <span> Total de la Venta $<?php echo $ventas->totalcompra; ?></span>
                </p>
            <?php } ?>
        </div>
        <div class="bloque">
            <h3>Ultimas Citas Agendadas</h3>
            <?php foreach ($ultimasCitas as $citas) {  ?>
                <p class="bloque__texto">
                    <?php echo  $citas->nombre; ?> a las <span><?php echo date("g:i a", strtotime($citas->hora)); ?> </span> el dia <span> <?php echo  strftime(" %d %B del %G", strtotime($citas->fecha)); ?></span>
                </p>
            <?php } ?>
        </div>
    </div>
</main>