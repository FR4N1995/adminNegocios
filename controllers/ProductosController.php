<?php

namespace Controllers;

use MVC\Router;
use Model\Registro;
use Model\Productos;
use Classes\Paginacion;
use Intervention\Image\ImageManagerStatic as Image;


class ProductosController
{

    public static function index(Router $router)
    {
        if (!isAuth()) {
            header('Location: /');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        $bandera = true;
//        if (!$pagina_actual || $pagina_actual < 1) {
  //          header('Location: /admin/productos?page=1');
    //    }
        //$registros_por_pagina = 10;
        $total = Productos::total('usuario_id', $_SESSION['id']);
        //$paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);
//        $productos = Productos::all('usuario_id', $_SESSION['id'],);
//	$productos = Productos::wherearray(['usuarioid' => $_SESSION['id']]);  
	$productos = Productos::wherearray(['usuario_id' => $_SESSION['id']]);
      $registroExistente = Registro::wherearray(['usuarioid' => $_SESSION['id'], 'activo' => '1']);

        if ($registroExistente) {
            if ($registroExistente[0]->paquete_id === '1' && $total >= 20) {
                $bandera = false;
            } elseif ($registroExistente[0]->paquete_id === '2' && $total >= 50) {
                $bandera = false;
            }
        } else {
            header('Location: /finalizar-registro');
        }

        $router->render('admin/productos/index', [
            'titulo' => 'Productos',
            'productos' => $productos,
          //  'paginacion' => $paginacion->paginacion(),
            'bandera' => $bandera,
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin'],
            'superAdmin' => 0
        ]);
    }


    public static function crear(Router $router)
    {
        if (!isAuth()) {
            header('Location: /');
        }
        $alertas = [];
        $productos = new Productos();

        $totalProductos = Productos::total('usuario_id', $_SESSION['id']);
        $registroExistente = Registro::wherearray(['usuarioid' => $_SESSION['id'], 'activo' => '1']);

        if ($totalProductos >= 20 && $registroExistente[0]->paquete_id === '1') {
            header('Location: /admin/productos');
        }elseif($totalProductos >= 50 && $registroExistente[0]->paquete_id === '2'){
            header('Location: /admin/productos');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAuth()) {
                header('Location: /');
            }

            //leemos la imagen
            if (!empty($_FILES['imagen']['tmp_name'])) {

                $carpeta_imagenes = '../public/img/products';
                //Creamos la carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            }

            $_POST['usuario_id'] = $_SESSION['id'];
            //Sincronizamos todo lo que mandamos via POST
            $productos->sincronizar($_POST);

            $alertas = $productos->validar();

            if (empty($alertas)) {
                //guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

                $resultado = $productos->guardar();

                if ($resultado) {
                    header('Location: /admin/productos');
                }
            }
        }

        $router->render('admin/productos/crear', [
            'titulo' => 'Registrar Producto',
            'alertas' => $alertas,
            'productos' => $productos,
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin'],
            'superAdmin' => 0
        ]);
    }


    public static function editar(Router $router)
    {
        if (!isAuth()) {
            header('Location: /');
        }

        $alertas = [];
        $id = $_GET['id'];
        //asegurarnos de qie el id sea un numero
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /admin/productos');
        }
        $productos = Productos::find($id);

        if (!$productos) {
            header('Location: /admin/productos');
        }

        $productos->imagen_actual = $productos->imagen;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAuth()) {
                header('Location: /');
            }

            //leer imagen
            if (!empty($_FILES['imagen']['tmp_name'])) {

                $carpeta_imagenes = '../public/img/products';

                //creamos la carpeta si no existe
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }


                $nombre_imagen = md5(uniqid(rand(), true));
                // debuguear($_FILES['imagen']['tmp_name']);


                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);
                // debuguear($nombre_imagen);
                $productos->setImagen($nombre_imagen);
                // debuguear($ponente);


                // $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $productos->imagen_actual;
            }

            $productos->sincronizar($_POST);

            $alertas = $productos->validar();

            if (empty($alertas)) {
                if (isset($nombre_imagen)) {
                    //guardar las imagenes
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                }
                $resultado = $productos->guardar();

                if ($resultado) {
                    header('Location: /admin/productos');
                }
            }
        }

        $router->render('admin/productos/editar', [
            'titulo' => 'Actualizar Producto',
            'alertas' => $alertas,
            'productos' => $productos,
            'nombre'=> $_SESSION['nombre'],
            'admin' => $_SESSION['admin'],
            'superAdmin' => 0
        ]);
    }


    public static function eliminar()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];

            //nos aseguramos que el id sea un numero
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if (!$id) {
                header('Location: /admin/productos');
            }

            $productos = Productos::find($id);

            if (!isset($productos)) {
                header('Location: /admin/productos');
            }

            //aqui eliminamos imagen del servidor
            $productos->setImagen($_POST['imagen']);
            //Eliminamos el registro de la base de datos
            $resultado = $productos->eliminar();


            if ($resultado) {
                header('Location: /admin/productos');
            }
        }
    }


    public static function verModal(){
        
    }
}
