<h2 class="dashboard__heading"><?php echo $titulo ?></h2>
<div class="dashboard__contenedor-boton">
    <a href="/admin/corte" class="dashboard__boton">
        <i class="fa-solid fa-circle-plus"></i>
        volver
    </a>
</div>
<div class="dashboard__formulario">
    <form method="POST" action="/admin/corte/cortedia">
        <div class="formulario__campo">
            <label for="fecha" class="formulario__label">selecciona Fecha</label>
            <input type="date" value="<?php echo $ventas->fecha ?? '' ?>" class="formulario__input" id="fecha" name="fecha">
        </div>
        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Consultar">
    </form>
</div>
<?php if (!empty($ventas)) {  ?>
    <div class="dashboard__contenedor">
        <?php
        if (count($ventas) === 0) {
            echo "<h2>Dia sin Ventas</h2>";
        }
        ?>
        <ul class="ventas">
            <?php
            $idventa = 0;
            $totalVenta = 0;
            foreach ($ventas as $key => $venta) :
                if ($idventa !== $venta->ventaid) {
                    $total = 0;
            ?>
                    <li>
                        <p>Hora: <span><?php echo date("g:i a", strtotime($venta->hora));  ?></span></p>
                        <p>Fecha: <span><?php echo strftime("%A %d %B del %G", strtotime($venta->fecha)) ?></span></p>
                        <p>vendedor: <span><?php echo $venta->nombre ?></span></p>
                        <p>Cantidad: <span><?php echo $venta->cantidad ?></span></p>
                    <?php
                    $idventa = $venta->ventaid;
                    // echo date_format(date_create($venta->fecha), "Y-F-l");
                }
                $total += $venta->precio * $venta->cantidad;

                $totalVenta += $venta->precio * $venta->cantidad;

                    ?>
                    <p>Peoducto: <span><?php echo $venta->productos . " " . "$" . $venta->precio  ?></span></p>

                    <?php
                    $actual = $venta->ventaid;
                    $proximo = $ventas[$key + 1]->ventaid ?? 0;

                    if (esUltimo($actual, $proximo)) { ?>
                        <p class="total">Total:<span> $<?php echo $total; ?></span></p>
                        <!-- <form action="/api/eliminar/venta" method="POST">
                        <input type="hidden" name="id" value="<?php echo $venta->ventaid; ?>">
                        <input type="submit" class="ventas__boton" value="Elimiar">
                    </form> -->
                    </li>
                <?php } ?>
            <?php endforeach ?>
        </ul>
        <div class="totalDia">
            <div class="dashboard__contenedorpdf">
                <form action="/admin/corte/cortedia/pdf?fecha=<?php echo $venta->fecha; ?>" method="POST" target="_blank">
                    <input type="hidden" value="<?php echo $ventas->fecha; ?>">
                    <input class="dashboard__contenedorpdf-boton" type="submit" value="Generar PDF">
                </form>
            </div>
            <p class="">Venta Total del dia:<span> $<?php echo $totalVenta; ?></span></p>
        </div>
    </div>
<?php } else { ?>
    <div class="dashboard__contenedor">
        <h2 class="sinVentas">Dia sin Ventas</h2>
    </div>
<?php } ?>