<?php

namespace Controllers;

use MVC\Router;
use Model\Tiempo;
use Model\Paquetes;
use Model\Registro;
use Model\Usuarios;
use Classes\Paginacion;

class SuperDashboardController
{

    public static function index(Router $router)
    {
        if (!isAuth()) {
            header('Location: /');
        }
        if (!isSuperAdmin()) {
            header('Location: /');
        }

        //ingresos
        //mensual
        $basico = Registro::totalArray(['paquete_id' => 1, 'tiempo_id' => 1]);
        $normal = Registro::totalArray(['paquete_id' => 2, 'tiempo_id' => 1]);
        $completo = Registro::totalArray(['paquete_id' => 3, 'tiempo_id' => 1]);
        //anual
        $basicoAnual = Registro::totalArray(['paquete_id' => 1, 'tiempo_id' => 2]);
        $normalAnual = Registro::totalArray(['paquete_id' => 2, 'tiempo_id' => 2]);
        $completoAnual = Registro::totalArray(['paquete_id' => 3, 'tiempo_id' => 2]);
        $ingresos = ($basico * 200) + ($normal * 400) + ($completo * 600) + ($basicoAnual * 2000) + ($normalAnual * 4400) + ($completoAnual * 6500);
        //  debuguear($completo);
        //Ultimos registros
        $lastRegistros = Registro::ordenarLimite('id', 'id', $_SESSION['id'], 'DESC', 5);

        foreach ($lastRegistros as $lastRegistro) {
            $lastRegistro->paquete = Paquetes::find($lastRegistro->paquete_id);
        }

        // debuguear($_SESSION);
        $router->render('superadmin/dashboard/index', [
            'titulo' => 'Panel del Super Administracion',
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin'],
            'superAdmin' => $_SESSION['superadmin'],
            'ingresos' => $ingresos,
            'lastRegistros' => $lastRegistros
        ]);
    }

    public static function usuariosAdmin(Router $router){
        if (!isAuth()) {
            header('Location: /');
        }
        if (!isSuperAdmin()) {
            header('Location: /');
        }
        // debuguear($_SESSION);
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if (!$pagina_actual || $pagina_actual < 1 ) {
            header('Location: /superadmin/usuariosadmin?page=1');
        }
        
        $registros_por_pagina = 10;

        $total = Usuarios::total();
        // debuguear($total);
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

         $usuarios = Usuarios::paginar($registros_por_pagina, $paginacion->offset());
        //  $usuarios = Usuarios::all();
       
        // debuguear($usuarios);

        $router->render('superadmin/usuarios/index', [
            'titulo' => 'Usuarios con Cuenta',
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin'],
            'superAdmin' => $_SESSION['superadmin'],
            'usuarios' => $usuarios,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function registrados(Router $router){
        if (!isAuth()) {
            header('Location: /');
        }
        if (!isSuperAdmin()) {
            header('Location: /');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if (!$pagina_actual || $pagina_actual < 1 ) {
            header('Location: /superadmin/registrados?page=1');
        }
        
        $registros_por_pagina = 10;

        $total = Registro::total();

        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        $registros = Registro::paginar($registros_por_pagina, $paginacion->offset());

        foreach ($registros as $registro) {
             $registro->paquete = Paquetes::find($registro->paquete_id);
             $registro->usuario = Usuarios::find($registro->usuarioid);
             $registro->tiempo = Tiempo::find($registro->tiempo_id);
        }
        //  debuguear($registros);
        $router->render('superadmin/registrados/index', [
            'titulo' => 'Registrados de algun paquete',
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin'],
            'superAdmin' => $_SESSION['superadmin'],
            'registros' => $registros,
            'paginacion' => $paginacion->paginacion()
        ]);

    }

    public static function eliminaruser(){

        if ($_SERVER['REQUEST_METHOD']==='POST') {
            // debuguear($_POST);
            $id = $_POST['id'];

            //nos aseguramos que el id sea un numero
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if (!$id) {
                header('Location: /superadmin/usuariosadmin');
            }

            $usuarios = Usuarios::find($id);
            
            if (!isset($usuarios)) {
                header('Location: /superadmin/usuariosadmin');
            }

            $resultado = $usuarios->eliminar();

            if ($resultado) {
                header('Location: /superadmin/usuariosadmin');
            }
        }
    }

    public static function eliminarRegistro(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // debuguear($_POST);
            $id = $_POST['id'];

            $id = filter_var($id, FILTER_VALIDATE_INT);
            if (!$id) {
                header('Location: /superadmin/registrados');
            }
            $registros = Registro::find($id);

            if (!isset($registros)) {
                header('Location: /superadmin/registrados');
            }
            $resultado = $registros->eliminar();
            if ($resultado) {
                header('Location: /superadmin/registrados');
            }


        }
    }
}
