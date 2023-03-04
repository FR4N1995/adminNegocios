<h2 class="dashboard__heading"><?php echo $titulo ?></h2>


<div class="dashboard__contenedor-boton">
    <a href="/admin/usuarios/crear"  class="dashboard__boton <?php echo ($bandera===false) ? 'dashboard__deshabilitar' : '';?>">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Empleado
    </a>
</div>


<div class="dashboard__contenedor">
    <?php if(!empty($empleados)) { ?>

        
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">telefono</th>
                    <th scope="col" class="table__th">Puesto</th>

                    <th scope="col" class="table__th">opciones</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach($empleados as $empleado) {?>
                  
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $empleado->nombre . " " . $empleado->apellido; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $empleado->telefono; ?>
                        </td>
                        <td class="table__td">
                            <?php echo ($empleado->admin === '1') ? 'Administrador' : 'Empleado' ?>
                        </td>
                       
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/usuarios/editar?id=<?php echo $empleado->id; ?>">
                                <i class="fa-solid fa-pencil"></i>
                                
                            </a>
                            <form method="POST" action="/admin/usuarios/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $empleado->id; ?>">
                                <button  type="submit" class="table__accion table__accion--eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                    
                                </button>
                            </form>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>

    <?php } else { ?>
        <p class="text-center">Aún no tienes Empleados, empieza creando uno

        </p>

    <?php } ?>

</div>