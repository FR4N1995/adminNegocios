<h2 class="dashboard__heading"><?php echo $titulo ?></h2>
<div class="dashboard__contenedor-boton">
    <a href="/admin/corte" class="dashboard__boton">
        <i class="fa-solid fa-circle-plus"></i>
        volver
    </a>
</div>
<div class="dashboard__formulario">
    <form method="POST" action="/admin/corte/cortefecha">
        <div class="formulario__campo formulario__campo">
            <label for="fecha_inicio" class="formulario__label">selecciona Fecha inicio</label>
            <input type="date" class="formulario__input" id="fecha_inicio" name="fecha_inicio">
        </div>
        <div class="formulario__campo formulario__campo">
            <label for="fecha_final" class="formulario__label">selecciona Fecha Final</label>
            <input type="date" class="formulario__input" id="fecha_final" name="fecha_final">
        </div>
        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Consultar">
    </form>
</div>
<?php if (!empty($ventas)) {  ?>
    <div class="dashboard__contenedor">
        <?php
        if (count($ventas) === 0) {
            echo '<h2 class="sinVentas">Dia sin Ventas</h2>';
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
                        <p>Hora: <span><?php echo date("g:i a", strtotime($venta->hora)); ?></span></p>
                        <p>Fecha: <span><?php echo utf8_decode(strftime("%A %d %B del %G", strtotime($venta->fecha))); ?></span></p>
                        <p>vendedor: <span><?php echo $venta->nombre ?></span></p>
                        <p>Cantidad: <span><?php echo $venta->cantidad ?></span></p>
                    <?php
                    $idventa = $venta->ventaid;
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
            <nav class="dashboard__contenedorpdf">
                <button type="button" class="dashboard__contenedorpdf-boton" id="pdf">PDF</button>
            </nav>
            <p class="">Venta Total:<span> $<?php echo $totalVenta; ?></span></p>
        </div>
        <!-- este formulario se debera desplegar cuando le de click al boton PDF -->
        <div class="dashboard__formulariopdf" id="formulariopdf">
            <form action="/admin/corte/cortefecha/pdf" target="_blank">
                <div class="formulario__campo formulario__campo">
                    <label for="fecha_iniciopdf" class="formulario__label">selecciona Fecha inicio</label>
                    <input type="date" class="formulario__input" id="fecha_iniciopdf" name="fecha_iniciopdf">
                </div>
                <div class="formulario__campo formulario__campo">
                    <label for="fecha_finalpdf" class="formulario__label">selecciona Fecha Final</label>
                    <input type="date" class="formulario__input" id="fecha_finalpdf" name="fecha_finalpdf">
                </div>
                <input class="formulario__submit formulario__submit--registrar" type="submit"  id="generarPDF" value="generar PDF">
            </form>
        </div> 
        <!-- <div class="dashboard__formulariopdf" id="formulariopdf">
            <form action="/admin/corte/cortefecha/pdf" target="_blank">
                <div class="formulario__campo formulario__campo">
                    <label for="fecha_iniciopdf" class="formulario__label">selecciona Fecha inicio</label>
                    <input type="date" class="formulario__input" id="fecha_iniciopdf" name="fecha_iniciopdf">
                </div>
                <div class="formulario__campo formulario__campo">
                    <label for="fecha_finalpdf" class="formulario__label">selecciona Fecha Final</label>
                    <input type="date" class="formulario__input" id="fecha_finalpdf" name="fecha_finalpdf">
                </div>
                <input type="submit" value="generar PDF">
            </form>

        </div> -->
    </div>

<?php } else { ?>

    <div class="dashboard__contenedor">
        <h2 class="sinVentas">Dia sin Ventas</h2>

    </div>


<?php } ?>