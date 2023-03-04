<?php

namespace Controllers;

// use FPDF;
use Model\Empleados;
use MVC\Router;
use Model\ResumenVentas;
class CorteController
{
    public static function index(Router $router)
    {
        if (!isAuth()) {
            header('Location: /');
        }
        $router->render('/admin/corte/index', [
            'titulo' => 'Opciones de corte',
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin'],
            'superAdmin' => 0
        ]);
    }
    public static function ventas_dia(Router $router)
    {

        if (!isAuth()) {
            header('Location: /');
        }
        $ventas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAuth()) {
                header('Location: /');
            }
            // debuguear($_POST);

            $fecha = $_POST['fecha'] ?? date('Y-m-d');
            //El id lo vamos a tomar de la session
            $id = $_SESSION['id'];

            $consulta = " SELECT ventas.id, ventas.nombre, ventas.fecha, ventas.hora, ventasproductos.cantidad as cantidad, ventasproductos.id as ventaid, productos.nombre as productos, productos.precio from ventas ";
            $consulta .= "JOIN ventasproductos ON ventas.id = ventasproductos.ventas_id JOIN productos ON productos.id = ventasproductos.productos_id JOIN ";
            $consulta .= "usuarios ON usuarios.id = ventas.ventasusuario_id";
            $consulta .= " WHERE ventas.fecha = '${fecha}' AND ventas.ventasusuario_id = '${id}'";
            $ventas = ResumenVentas::SQL($consulta);

            // $objetopdf = new pdf();

            // $objetopdf->generarPDF($ventas);

            // $pdf = new FPDF();
            // $pdf->AddPage();
            // $pdf->SetFont('Arial','B',16);
            // $pdf->Cell(40,10,'¡primer hola mundo!');
            // $pdf->Output();
       
        }

        $router->render('/admin/corte/ventasdia', [
            'titulo' => 'Corte Por dia Seleccionado',
            'ventas' => $ventas,
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin'],
            'id' => $_SESSION['id'],
            'superAdmin' => 0
        ]);
    }

    public static function ventasempleado(Router $router)
    {
        if (!isAuth()) {
            header('Location: /');
        }
        $ventas = [];
        $empleados = Empleados::belongsTo('id_usuario', $_SESSION['id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAuth()) {
                header('Location: /');
            }
            // debuguear($_POST);
            $fecha = $_POST['fecha'] ?? date('Y-m-d');
            $nombreEmpleado = $_POST['id_usuario'];
            $id = $_SESSION['id'];

            $consulta = " SELECT ventas.id, ventas.nombre, ventas.fecha, ventas.hora, ventasproductos.cantidad as cantidad, ventasproductos.id as ventaid, productos.nombre as productos, productos.precio from ventas ";
            $consulta .= "JOIN ventasproductos ON ventas.id = ventasproductos.ventas_id JOIN productos ON productos.id = ventasproductos.productos_id JOIN ";
            $consulta .= "usuarios ON usuarios.id = ventas.ventasusuario_id";
            $consulta .= " WHERE ventas.fecha = '${fecha}' AND ventas.ventasusuario_id = '${id}' AND ventas.nombre = '${nombreEmpleado}'";
            $ventas = ResumenVentas::SQL($consulta);
        }

        $router->render('/admin/corte/ventasempleado', [
            'titulo' => 'Ventas Totales Por Empleado',
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin'],
            'empleados' => $empleados,
            'ventas' => $ventas,
            'superAdmin' => 0
        ]);
    }

    public static function ventaFechas(Router $router)
    {
        if (!isAuth()) {
            header('Location: /');
        }
        $ventas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAuth()) {
                header('Location: /');
            }

            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_final = $_POST['fecha_final'];
            $id = $_SESSION['id'];


            $consulta = " SELECT ventas.id, ventas.nombre, ventas.fecha, ventas.hora, ventasproductos.cantidad as cantidad, ventasproductos.id as ventaid, productos.nombre as productos, productos.precio from ventas ";
            $consulta .= "JOIN ventasproductos ON ventas.id = ventasproductos.ventas_id JOIN productos ON productos.id = ventasproductos.productos_id JOIN ";
            $consulta .= "usuarios ON usuarios.id = ventas.ventasusuario_id";
            $consulta .= " WHERE ventas.ventasusuario_id = '${id}' AND ventas.fecha BETWEEN '${fecha_inicio}' and '${fecha_final}'";
            $ventas = ResumenVentas::SQL($consulta);
        }

        $router->render('/admin/corte/ventafechas', [
            'titulo' => 'Elige fechas para el Corte',
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin'],
            'ventas' => $ventas,
            'superAdmin' => 0
        ]);
    }
}
