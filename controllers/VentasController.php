<?php

namespace Controllers;

use MVC\Router;
use Model\Ventas;
use Model\Registro;
use Model\Productos;
use Model\ResumenVentas;
use Model\VentasProductos;

class VentasController
{

    public static function index(Router $router)
    {
        if (!isAuth()) {
            header('Location: /');
        }
        
        $bandera = true;
        //Aqui pondremos el id del usuario con la SESSION
        $productos = Productos::belongsTo('usuario_id', $_SESSION['id']);
        $totalVentas = Ventas::total('ventasusuario_id', $_SESSION['id']);
        $registroExistente = Registro::wherearray(['usuarioid' => $_SESSION['id'], 'activo' => '1']);

        if ($registroExistente) {
            if ($registroExistente[0]->paquete_id === '1' && $totalVentas >= 60) {
                $bandera = false;
            }elseif($registroExistente[0]->paquete_id === '2' && $totalVentas >= 150){
                $bandera = false;
            }
        } else {
            header('Location: /finalizar-registro');
        }
        //  debuguear($productos);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if (!isAuth()) {
                header('Location: /');
            }

            $productos = explode(',', $_POST['productos_id']);
            $subtotal = explode(',', $_POST['subtotal']);
            $cantidad = explode(',', $_POST['cantidad']);
            $total = array_sum($subtotal);
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            // $nombre = trim($_SESSION['nombre'], $_SESSION['nombre'] = " ");

            $args = [
                'nombre' => $_SESSION['nombre'],
                'fecha' => $fecha,
                'hora' => $hora,
                'totalcompra' => $total,
                'ventasusuario_id' => $_SESSION['id']
            ];

            //validar disponibilidad del producto
            foreach($productos as $productos_id){
                $producto = Productos::find($productos_id);

                if (!isset($producto) || $producto->disponible === "0") {
                    echo json_encode(['resultado' === false]);
                    return;
                }
            }
            
            //guardamos la venta
            $venta = new Ventas($args);
            $resultado = $venta->guardar();

            $id = $resultado['id'];

            $d = array_map(null, $productos, $subtotal, $cantidad);
            // debuguear($d);
         
            $productos_array = [];
            $datos = [];

          

            for ($i = 0; $i <= count($d); $i++) {

                //Este if nos sirve para que no nos marque el error de undefaindet offset
                if (isset($d[$i])) {
                    $productos = Productos::find($d[$i][0]);
                    $productos_array[] = $productos;
                    $datos = [
                        'subtotal' =>  $d[$i][1],
                        'productos_id' => $d[$i][0],
                        'cantidad' => $d[$i][2],
                        'ventas_id' => $id
                    ];

                    $ventasProductos = new VentasProductos($datos);
                    $ventasProductos->guardar();
                }
            }
            //este codigo nos sirve para modificar la disponibilidad del producto 
            for ($i = 0; $i <= count($d); $i++) {
                if (isset($d[$i])) {
                    for ($j = $i; $j <= $productos_array; $j++) {

                        if ($productos_array[$j]) {
                            $productos_array[$j]->disponible -= $d[$i][2];
                            $productos_array[$j]->guardar();
                            break;
                        }
                    }
                }
            }
            //    debuguear($d);
            if ($resultado) {
                echo json_encode([
                    'resultado' => $resultado,
                    'mensaje' => 'Venta realizada Correctamente'
                ]);
            }




            return;
            // debuguear($_POST);

        }

        $router->render('admin/ventas/index', [
            'titulo' => 'Ventas',
            'productos' => $productos,
            'bandera' => $bandera,
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin'],
            'superAdmin' => 0
        ]);
    }

    // public static function ventasTotales(Router $router){
    //     if (!isAuth()) {
    //         header('Location: /');
    //     }
    //          $ventas = [];
    //     if ($_SERVER['REQUEST_METHOD']==='POST') {
    //         if (!isAuth()) {
    //             header('Location: /');
    //         }
    //         // debuguear($_POST);

    //         $fecha = $_POST['fecha'] ?? date('Y-m-d');
    //         //El id lo vamos a tomar de la session
    //         $id = $_SESSION['id'];

    //         $consulta = " SELECT ventas.id, ventas.nombre, ventas.fecha, ventas.hora, ventasproductos.cantidad as cantidad, ventasproductos.id as ventaid, productos.nombre as productos, productos.precio from ventas ";
    //         $consulta .= "JOIN ventasproductos ON ventas.id = ventasproductos.ventas_id JOIN productos ON productos.id = ventasproductos.productos_id JOIN ";
    //         $consulta .= "usuarios ON usuarios.id = ventas.ventasusuario_id";
    //         $consulta .= " WHERE ventas.fecha = '${fecha}' AND ventas.ventasusuario_id = '${id}' ";
    //         $ventas = ResumenVentas::SQL($consulta);


    //     }

    //     $router->render('/admin/ventas/ventasTotales', [
    //         'titulo'=> 'Productos vendidos por dia',
    //         'ventas' => $ventas,
    //         'nombre'=> $_SESSION['nombre']
    //     ]);
    // }


    public static function ventas(Router $router){
        //falta traernos el id de la sesion
        if (!isAuth()) {
            header('Location: /');
        }
        $ventas = Ventas::belongsTo('ventasusuario_id', $_SESSION['id']);
        //Falta paginar las ventas Totales

        $router->render('/admin/ventas/ventas', [
            'titulo' => 'Total de ventas',
            'ventas' => $ventas,
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin'],
            'superAdmin' => 0
        ]);

    }

    public static function eliminar(){

        if ($_SERVER['REQUEST_METHOD']==='POST') {
            $id = $_POST['id'];

            $id = filter_var($id, FILTER_VALIDATE_INT);

            if (!$id) {
                header('Location: /admin/ventas');
            }

            $venta = Ventas::find($id);

            if (!isset($venta)) {
                header('Location: /admin/ventas');
            }

            $resultado = $venta->eliminar();

            if ($resultado) {
                header('Location: /admin/ventas/ventas');
            }

            // debuguear($id);
        }
    }
}
