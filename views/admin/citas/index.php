<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="dashboard__contenedor-boton">
    <a href="/admin/citas/crear" class="dashboard__boton <?php echo ($bandera === false) ? 'dashboard__deshabilitar' : ''; ?>">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Cita
    </a>
</div>

<div class="dashboard__contenedor" id="contenedorCitas">
    <?php if (!empty($citas)) { ?>

        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">fecha</th>
                    <th scope="col" class="table__th">hora</th>
                    <th scope="col" class="table__th">estado</th>
                    <th scope="col" class="table__th">opciones</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach ($citas as $cita) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $cita->nombre . " " . $cita->apellido; ?>
                        </td>
                        <td class="table__td">
                            <?php echo strftime(" %d %B del %G", strtotime($cita->fecha)); ?>
                        </td>
                        <td class="table__td">
                            <?php echo date("g:i a", strtotime($cita->hora));  ?>
                        </td>
                        <td class="table__td">
                            <form method="POST" action="/admin/citas/editar_estado" class="table__formulario table__formulario--estado">
                                <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                                <button type="submit" class="table__accion  <?php echo ($cita->estado) === '0' ? 'table__accion--pendiente' : 'table__accion--completada'; ?>">
                                    <?php echo ($cita->estado) === '0' ? 'Pendiente' : 'Completada'; ?>
                                </button>
                            </form>
                        </td>
                        <td class="table__td--acciones">
                            <button class="table__accion table__accion--ver" value="<?php echo $cita->id; ?>" id="vercita">
                                <i class="fa-regular fa-eye"></i>
                                ver
                            </button>
                            <a class="table__accion table__accion--editar" href="/admin/citas/editar?id=<?php echo $cita->id; ?>">
                                <i class="fa-solid fa-pencil"></i>

                            </a>
                            <form method="POST" action="/admin/citas/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                                <button type="submit" class="table__accion table__accion--eliminar">
                                    <i class="fa-solid fa-trash"></i>

                                </button>
                            </form>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>

    <?php } else { ?>
        <p class="text-center">Aún no hay Citas, empieza creando una

        </p>

    <?php } ?>

</div>
<?php
echo $paginacion;
?>