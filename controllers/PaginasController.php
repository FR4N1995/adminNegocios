<?php

namespace Controllers;

use MVC\Router;

class PaginasController{



    public static function index(Router $router){


        $router->render('paginas/index',[
            'titulo' => 'Home'
        ]);
    }

    public static function paquetes(Router $router){


        $router->render('paginas/paquetes',[
            'titulo' => 'Paquetes Disponibles'
        ]);
    }

    public static function preguntasFrecuentes(Router $router){

        $router->render('paginas/preguntasFrecuentes',[
            'titulo' => 'Preguntas Frecuentes'
        ]);
    }

    public static function blog(Router $router){
        $router->render('paginas/blog', [
            'titulo' => 'Blog'
        ]);
    }

}