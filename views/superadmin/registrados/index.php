<h2 class="dashboard__heading"><?php echo $titulo ?></h2>

<div class="dashboard__contenedor" id="contenedorProductos">
    <?php if (!empty($registros)) { ?>

        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Usuario</th>
                    <th scope="col" class="table__th">Paquete</th>
                    <th scope="col" class="table__th">Mensual/Anual</th>
                    <th scope="col" class="table__th">Estado</th>
                    <th scope="col" class="table__th">Fecha Inicio</th>
                    <th scope="col" class="table__th">Fecha Final</th>
                    <th scope="col" class="table__th">Acciones</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach ($registros as $registro) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $registro->usuario->nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo  $registro->paquete->nombre;; ?>
                        </td>
                        <td class="table__td">
                            <?php echo  $registro->tiempo->nombre;; ?>
                        </td>
                        <td class="table__td <?php echo ($registro->activo) === '1' ? 'table__td--confirmacion' : 'table__td--noconfirmacion';?>">
                            <?php echo ($registro->activo) === '1' ? 'Activo' : 'No Activo'; ?>
                        </td>
                        <td class="table__td">
                            <?php echo  strftime(" %d %B del %G", strtotime($registro->fecha_inicio)); ?>
                        </td>
                        <td class="table__td <?php echo ($registro->fecha_final > date('Y-m-d'))? '' : 'table__td--noconfirmacion'; ?>">
                            <?php echo  strftime(" %d %B del %G", strtotime($registro->fecha_final)); ?> 
                        </td>
                        <td class="table__td--acciones"> 
                            <!-- <button class="table__accion table__accion--ver" value="<?php echo $producto->id; ?>" id="ver">
                                <i class="fa-regular fa-eye"></i>
                                Ver
                            </button>
                            <a class="table__accion table__accion--editar" href="/admin/productos/editar?id=<?php echo $producto->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a> -->
                            <form method="POST" action="/superadmin/registrados/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $registro->id; ?>">
                                <button type="submit" class="table__accion table__accion--eliminar">
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
        <p class="text-center">Aún no hay registros de ningun usuario</p>

    <?php } ?>

</div>
<?php
echo $paginacion;
?>