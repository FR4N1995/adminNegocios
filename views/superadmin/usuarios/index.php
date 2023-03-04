<h2 class="dashboard__heading"><?php echo $titulo ?></h2>


<div class="dashboard__contenedor" id="contenedorProductos">
    <?php if (!empty($usuarios)) { ?>

        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Correo</th>
                    <th scope="col" class="table__th">Confirmacion Correo</th>
                    <th scope="col" class="table__th">Acciones</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach ($usuarios as $usuario) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $usuario->nombre . " " . $usuario->apellido; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $usuario->email; ?>
                        </td>
                        <td class="table__td <?php echo ($usuario->confirmado) === '1' ? 'table__td--confirmacion' : 'table__td--noconfirmacion';?>">
                            <?php echo ($usuario->confirmado) === '1' ? 'Confirmado' : 'No Confirmado'; ?>
                        </td>
                        <td class="table__td--acciones">
                            <!-- <button class="table__accion table__accion--ver" value=" <?php echo $producto->id;?>" id="ver">
                                <i class="fa-regular fa-eye"></i>
                                Ver
                            </button>
                            <a class="table__accion table__accion--editar" href="/admin/productos/editar?id= <?php echo $producto->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>-->
                            <form method="POST" action="/superadmin/usuariosadmin/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $usuario->id; ?>">
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
        <p class="text-center">Aún no hay cuentas de ningun usuario</p>

    <?php } ?>

</div>
<?php
echo $paginacion;
?>