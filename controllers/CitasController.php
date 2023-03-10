<?php
namespace Controllers;

use MVC\Router;
use Model\Citas;
use Model\Registro;
use Classes\Paginacion;

class CitasController{

    public static function index(Router $router){
        if (!isAuth()) {
            header('Location: /');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        $bandera = true;
        if (!$pagina_actual || $pagina_actual < 1 ) {
            header('Location: /admin/citas?page=1');
        }
        $registros_por_pagina = 10;

        $total = Citas::total('usuario_id', $_SESSION['id']);

        // $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        // $citas = Citas::paginarWhere('usuario_id', $_SESSION['id'], $registros_por_pagina, $paginacion->offset());
        $citas = Citas::all('usuario_id', $_SESSION['id'], $registros_por_pagina);
        $registroExistente = Registro::wherearray(['usuarioid' => $_SESSION['id'], 'activo' => '1']);

        if ($registroExistente) {
            if ($registroExistente[0]->paquete_id === '1' && $total >= 60) {
                $bandera = false;
            } elseif ($registroExistente[0]->paquete_id === '2' && $total >= 150) {
                $bandera = false;
            }
        } else {
            header('Location: /finalizar-registro');
        }

        $router->render('admin/citas/index', [
            'titulo' => 'Citas/Compromisos',
            'citas' => $citas,
            'bandera' => $bandera,
            // 'paginacion' => $paginacion->paginacion(),
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin'],
            'superAdmin' => 0
        ]);

        
    }

    public static function crear(Router $router){
        if (!isAuth()) {
            header('Location: /');
        }
        $alertas = [];
        $citas = new Citas();

        $totalCitas = Citas::total('usuario_id', $_SESSION['id']);
        $registroExistente = Registro::wherearray(['usuarioid' => $_SESSION['id'], 'activo' => '1']);
        if ($totalCitas >= 60 && $registroExistente[0]->paquete_id === '1') {
            header('/admin/citas');
        }elseif($totalCitas >= 150 && $registroExistente[0]->paquete_id === '2'){
            header('/admin/citas');
        }

        if ($_SERVER['REQUEST_METHOD']==='POST') {
            
            if (!isAuth()) {
                header('Location: /');
            }
            
            $_POST['usuario_id'] = $_SESSION['id'];

            $citas->sincronizar($_POST);
            
            $alertas = $citas->validarCita();

            if (empty($alertas)) {
                $citaExistente = Citas::wherearray(['fecha' => $citas->fecha, 'hora' => $citas->hora, 'usuario_id' => $citas->usuario_id]);
                if ($citaExistente) {
                    Citas::seterrores('error', 'fecha y hora ocupados, intenta con otra fecha o hora');
                }else{

                    $resultado = $citas->guardar();

                    if ($resultado) {
                        header('Location: /admin/citas');
                    }
                }
             
            }
        }
        $alertas = Citas::getErrores();
        $router->render('admin/citas/crear', [
            'titulo' => 'Crear Cita/Compromiso',
            'alertas' => $alertas,
            'citas' => $citas,
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin'],
            'superAdmin' => 0
        ]);

        
    }


    public static function editar(Router $router){
        if (!isAuth()) {
            header('Location: /');
        }

        $alertas = [];
        $id = $_GET['id'];

        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /admin/citas');
        }
        $citas = Citas::find($id);
        //Falta validar junto con la sesion del usuario
        if (!$citas) {
            header('Location: /admin/citas');
        }
        if ($_SERVER['REQUEST_METHOD']==='POST') {
            if (!isAuth()) {
                header('Location: /');
            }
            
            $citas -> sincronizar($_POST);
            //  debuguear($citas);

            $alertas = $citas->validarCita();
            //   debuguear($alertas);

            if (empty($alertas)) {
                
                $resultado = $citas->guardar();

                if ($resultado) {
                    header('Location: /admin/citas');
                }
            }
        }

       $router->render('admin/citas/editar',[
        'titulo' => 'Editar Cita/Compromiso',
        'alertas' => $alertas,
        'citas' => $citas,
        'nombre' => $_SESSION['nombre'],
        'admin' => $_SESSION['admin'],
        'superAdmin' => 0
       ]); 
    }

    public static function editarestado(){
        if (!isAuth()) {
            header('Location: /');
        }

        if ($_SERVER['REQUEST_METHOD']==='POST') {
            if (!isAuth()) {
                header('Location: /');
            }
            
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if (!$id) {
                header('Location: admin/citas');
            }
            $citas = Citas::find($id);
            //Falta evaluar con el inicio de sesion y la columna usuario_id
            if (!$citas) {
                header('Location: admin/citas');
            }

            $nuevo_estado = $citas->estado === "1" ? "0" : "1";

           
            $_POST['estado'] = $nuevo_estado;

            $citas->sincronizar($_POST);
            // debuguear($citas);

            $resultado = $citas->guardar();

            if ($resultado) {
                header('Location: /admin/citas');
            }

            // debuguear($citas);

          

        }

      
     }

     public static function eliminar(){
        if (!isAuth()) {
            header('Location: /');
        }

        if ($_SERVER['REQUEST_METHOD']==='POST') {
            if (!isAuth()) {
                header('Location: /');
            }
            
            $id = $_POST['id'];

            $id = filter_var($id, FILTER_VALIDATE_INT);

            if (!$id) {
                header('Location: /admin/citas');
            }

            $citas = Citas::find($id);

            if (!isset($citas)) {
                header('Location: /admin/citas');
            }

            $resultado = $citas->eliminar();

            if ($resultado) {
                header('Location: /admin/citas');
            }
            
        }


     }

}