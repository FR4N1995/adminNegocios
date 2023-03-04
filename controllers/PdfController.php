<?php
namespace Controllers;
use Classes\pdf;
use Model\ResumenVentas;

class PdfController{


    public static function pdfDia(){
            //  debuguear($_GET);
            if (!isAuth()) {
                header('Location: /');
            }

            $fecha= $_GET['fecha'];
            $id = $_SESSION['id'];

            $consulta = " SELECT ventas.id, ventas.nombre, ventas.fecha, ventas.hora, ventasproductos.cantidad as cantidad, ventasproductos.id as ventaid, ventasproductos.subtotal as subtotal, productos.nombre as productos, productos.precio from ventas ";
            $consulta .= "JOIN ventasproductos ON ventas.id = ventasproductos.ventas_id JOIN productos ON productos.id = ventasproductos.productos_id JOIN ";
            $consulta .= "usuarios ON usuarios.id = ventas.ventasusuario_id";
            $consulta .= " WHERE ventas.fecha = '${fecha}' AND ventas.ventasusuario_id = '${id}'";
            $ventas = ResumenVentas::SQL($consulta);
        
            
            $objetopdf = new pdf();
            $objetopdf->generarPDF($ventas);
        
      

    }

    public static function pdfFechas(){
        if (!isAuth()) {
            header('Location: /');
        }
        //  debuguear($_GET);
        //  debuguear($_POST);
        // debuguear(!empty($_POST));

        $fecha_inicio = $_GET['fecha_iniciopdf'];
        $fecha_final = $_GET['fecha_finalpdf'];
        $id = $_SESSION['id'];


        $consulta = " SELECT ventas.id, ventas.nombre, ventas.fecha, ventas.hora, ventasproductos.cantidad as cantidad, ventasproductos.id as ventaid, ventasproductos.subtotal as subtotal, productos.nombre as productos, productos.precio from ventas ";
        $consulta .= "JOIN ventasproductos ON ventas.id = ventasproductos.ventas_id JOIN productos ON productos.id = ventasproductos.productos_id JOIN ";
        $consulta .= "usuarios ON usuarios.id = ventas.ventasusuario_id";
        $consulta .= " WHERE ventas.ventasusuario_id = '${id}' AND ventas.fecha BETWEEN '${fecha_inicio}' and '${fecha_final}'";
        $ventas = ResumenVentas::SQL($consulta);

        //  debuguear($ventas);

        $objetopdf = new pdf();
        $objetopdf->generarfechasPdf($ventas, $fecha_inicio, $fecha_final);


    }

    public static function pdfEmpleado(){
        // debuguear($_GET);
        if (!isAuth()) {
            header('Location: /');
        }
        //  debuguear("hola");
        $fecha = $_GET['fecha'];
        $empleado = $_GET['id_usuario'];
        $id = $_SESSION['id'];


        $consulta = " SELECT ventas.id, ventas.nombre, ventas.fecha, ventas.hora, ventasproductos.cantidad as cantidad, ventasproductos.id as ventaid, ventasproductos.subtotal as subtotal, productos.nombre as productos, productos.precio from ventas ";
        $consulta .= "JOIN ventasproductos ON ventas.id = ventasproductos.ventas_id JOIN productos ON productos.id = ventasproductos.productos_id JOIN ";
        $consulta .= "usuarios ON usuarios.id = ventas.ventasusuario_id";
        $consulta .= " WHERE ventas.fecha = '${fecha}' AND ventas.ventasusuario_id = '${id}' AND ventas.nombre = '${empleado}'";
        $ventas = ResumenVentas::SQL($consulta);
        //   debuguear($ventas);

        $objetopdf = new pdf();
        $objetopdf->generarempleadoPdf($ventas);
    }
}