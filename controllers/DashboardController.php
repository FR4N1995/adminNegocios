<?php

namespace Controllers;

use Model\Citas;
use Model\Empleados;
use Model\Productos;
use MVC\Router;
use Model\Registro;
use Model\Ventas;

class DashboardController
{

    public static function index(Router $router)
    {
        if (!isAuth()) {
            header('Location: /');
        }
        //  debuguear($_SESSION);
        $id = $_SESSION['id'];
        $fechaActual = date('Y-m-d');
        // debuguear($fechaActual);
        //verificar si el usuario ya hizo un registro y fechas limites para que puedan acceder
        //whereArray
        $totalempleados = Empleados::total('id_usuario', $id);
        $totalProductos = Productos::total('usuario_id', $id);
        $registro = Registro::wherearray(['usuarioid' => $id, 'activo' => '1']);
        // debuguear([$registro[0]->fecha_final, $fechaActual]);
         if (!$registro || $fechaActual > $registro[0]->fecha_final || $registro[0]->activo === '0') {
             header('Location: /finalizar-registro');
         }
        //Productos menos Disponibles
        $prodMenosDisp = Productos::ordenarLimite('disponible', 'usuario_id', $id, 'ASC', 5);
        //Productos mas diponibles
        $prodMasDisp = Productos::ordenarLimite('disponible', 'usuario_id', $id, 'DESC', 5);
        //Ultimas citas agregadas
         $ultimasCitas = Citas::ordenarLimite('fecha', 'usuario_id', $id,  'DESC', 5);
        //Ultimas ventas agregadas
         $ultimasVentas = Ventas::ordenarLimite('fecha', 'ventasusuario_id', $id,  'DESC', 5);
        //problema si el usuario contrata el paquete completo y solo agrega un solo empleado
        //lo mejor sera meter un if y ver 
        if ($registro[0]->paquete_id === '1' ) {
            if ($totalempleados > 1 || $totalProductos > 20) {
                $idEmpleados = Empleados::RegistrosEliminar('id_usuario', $id, 1);
                $idCitas = Citas::RegistrosEliminar('usuario_id', $id, 60);
                $idproductos = Productos::RegistrosEliminar('usuario_id', $id, 20);
                $idVentas = Ventas::RegistrosEliminar('ventasusuario_id', $id, 60);
                foreach ($idEmpleados as $idempleado) {
                    $idempleado->eliminar();
                }
                foreach ($idCitas as $idCita) {
                    $idCita->eliminar();
                }
                foreach ($idproductos as $idProducto) {
                    $idProducto->eliminar();
                }
                foreach ($idVentas as $idVenta) {
                    $idVenta->eliminar();
                }
            }
        } elseif ($registro[0]->paquete_id === '2') {
            if ($totalempleados > 5 || $totalProductos > 50) {
                $idEmpleados = Empleados::RegistrosEliminar('id_usuario', $id, 5);
                $idCitas = Citas::RegistrosEliminar('usuario_id', $id, 150);
                $idproductos = Productos::RegistrosEliminar('usuario_id', $id, 50);
                $idVentas = Ventas::RegistrosEliminar('ventasusuario_id', $id, 150);
                foreach ($idEmpleados as $idempleado) {
                    $idempleado->eliminar();
                }
                foreach ($idCitas as $idCita) {
                    $idCita->eliminar();
                }
                foreach ($idproductos as $idProducto) {
                    $idProducto->eliminar();
                }
                foreach ($idVentas as $idVenta) {
                    $idVenta->eliminar();
                }
            }
        }


        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administracion',
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin'],
            'prodMenosDisp' => $prodMenosDisp,
            'prodMasDisp' => $prodMasDisp,
            'ultimasCitas' => $ultimasCitas,
            'ultimasVentas' => $ultimasVentas,
            'superAdmin' => 0,
            'registro' => $registro[0]
        ]);
    }
}
