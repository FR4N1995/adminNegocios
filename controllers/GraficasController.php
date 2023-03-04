<?php

namespace Controllers;

use Model\Productos;
use MVC\Router;


class GraficasController{

    public static function index(Router $router){

        if (!isAuth()) {
            header('Location: /');
        }


        $router->render('admin/graficas/index',[
            'titulo' => 'Graficas',
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin'],
            'superAdmin' => 0
        ]);
    }

    public static function graficaProductos(){
        if (!isAuth()) {
            header('Location: /');
        }
        $productos = Productos::belongsTo('usuario_id', $_SESSION['id']);
        echo json_encode($productos);
    }

}