<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="dashboard__contenedor-boton">
    <a href="/admin/productos/crear" id="paco" class="dashboard__boton <?php echo ($bandera === false) ? 'dashboard__deshabilitar' : ''; ?>">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Producto
    </a>
</div>


<div class="dashboard__contenedor" id="contenedorProductos">
    <?php if (!empty($productos)) { ?>

        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">precio</th>
                    <th scope="col" class="table__th">Cantidad Disponible</th>
                    <th scope="col" class="table__th">Acciones</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach ($productos as $producto) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $producto->nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo "$ " . $producto->precio; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $producto->disponible . " disponibles"; ?>
                        </td>
                        <td class="table__td--acciones">
                            <button class="table__accion table__accion--ver" value="<?php echo $producto->id; ?>" id="ver">
                                <i class="fa-regular fa-eye"></i>
                                Ver
                            </button>
                            <a class="table__accion table__accion--editar" href="/admin/productos/editar?id=<?php echo $producto->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>
                            <form method="POST" action="/admin/productos/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                                <button type="submit" class="table__accion table__accion--eliminar">
                                <i class="fa-solid fa-trash"></i>
                                    Eliminar
                                </button>
                            </form>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>

    <?php } else { ?>
        <p class="text-center">Aún no hay productos, empieza creando uno</p>

    <?php } ?>

</div>

<?php
//echo $paginacion;
?>
