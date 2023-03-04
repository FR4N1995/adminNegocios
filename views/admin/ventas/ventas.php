<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="dashboard__contenedor-boton">
    <a href="/admin/ventas" class="dashboard__boton">
        <i class="fa-solid fa-circle-plus"></i>
        volver
    </a>
</div>


<div class="dashboard__contenedor">
    <?php if(!empty($ventas)) { ?>

        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Vendedor</th>
                    <th scope="col" class="table__th">fecha</th>
                    <th scope="col" class="table__th">hora</th>
                    <th scope="col" class="table__th">Total/Compra</th>

                    <th scope="col" class="table__th">Acciones</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach($ventas as $venta) {?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $venta->nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo strftime(" %d %B del %G", strtotime($venta->fecha)); ?>
                        </td>
                        <td class="table__td">
                            <?php echo date("g:i a", strtotime($venta->hora)); ?>
                        </td>
                        <td class="table__td">
                            <?php echo "$ " . $venta->totalcompra; ?>
                        </td>
                        <td class="table__td--acciones">
                            <!-- <a class="table__accion table__accion--editar" href="/admin/productos/editar?id=<?php echo $producto->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a> -->
                            <form method="POST" action="/admin/ventas/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $venta->id; ?>">
                                <button  type="submit" class="table__accion table__accion--eliminar">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>

    <?php } else { ?>
        <p class="text-center">Aun no Existe algun registro de alguna venta</p>

    <?php } ?>

</div>