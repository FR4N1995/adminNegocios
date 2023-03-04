<?php

namespace Controllers;

use Model\Empleados;
use Model\Registro;

use MVC\Router;

class UsuariosController
{


    public static function index(Router $router)
    {
        if (!isAuth()) {
            header('Location: /');
        }
        $id = $_SESSION['id'];
        $bandera = true;
        // $registro = new Registro();
        //El belongsto lo uso para poder mostrar todos los empleados en la tabla
        $empleados = Empleados::belongsTo('id_usuario', $id);
        //$empleados = Empleados::total('id_usuario', $id);
        $registroExistente = Registro::wherearray(['usuarioid' => $id, 'activo' => '1']);
        $paquete = $registroExistente[0];

        if ($registroExistente) {
            if ($paquete->paquete_id === '1' && count($empleados) >= 1) {
                $bandera = false;
            } elseif ($paquete->paquete_id === '2' && count($empleados) >= 5) {
                $bandera = false;
            } elseif ($paquete->paquete_id === '3' && count($empleados) >= 10) {
                $bandera = false;
            }
        }
        // y tambien cuantos empleados ya tiene registrados
        //para poder dejarlo agregar o no

        // $empleados = Empleados::belongsTo('id_usuario', '1');
        // debuguear($empleados);
        $router->render('admin/usuarios/index', [
            'titulo' => 'Empleados',
            'empleados' => $empleados,
            'bandera' => $bandera,
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin']
        ]);
    }

    public static function crear(Router $router)
    {
        if (!isAuth()) {
            header('Location: /');
        }
        $alertas = [];
        $empleados = new Empleados;
        //En donde esta el uno sera el id de la session
        //comprobamos cuantos empleados tiene registrados
        $totalEmpleados = Empleados::total('id_usuario', $_SESSION['id']);
        //verificamos que este registrado
        $registroExistente = Registro::wherearray(['usuarioid' => $_SESSION['id'], 'activo' => '1']);
        //asignamos el objeto a una variable para poder acceder al tipo de paquete
        $paquete = $registroExistente[0];

        if ($totalEmpleados >= 1 && $paquete->paquete_id === '1') {
            header('Location: /admin/usuarios');
        } elseif ($totalEmpleados >= 5 && $paquete->paquete_id === '2') {
            header('Location: /admin/usuarios');
        } elseif ($totalEmpleados >= 10 && $paquete->paquete_id === '3') {
            header('Location: /admin/usuarios');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // debuguear($_POST);
            if (!isAuth()) {
                header('Location: /');
            }

            $_POST['id_usuario'] = $_SESSION['id'];
            // trim($_POST['nombre'], " ");
            $empleados->sincronizar($_POST);
            
            $alertas = $empleados->validar();

            if (empty($alertas)) {
                $empleadoExistente = Empleados::wherearray(['id_usuario' => $empleados->id_usuario, 'telefono' => $empleados->telefono]);

                if ($empleadoExistente) {
                    Empleados::seterrores('error', 'Este numero de Telefono ya se encuentra dado de alta');
                } else {
                    $resultado = $empleados->guardar();

                    if ($resultado) {
                        header('Location: /admin/usuarios');
                    }
                }
            }
        }

        $alertas = Empleados::getErrores();
        $router->render('admin/usuarios/crear', [
            'titulo' => 'Agregar Empleado',
            'alertas' => $alertas,
            'empleados' => $empleados,
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin']
        ]);
    }

    public static function editar(Router $router)
    {
        if (!isAuth()) {
            header('Location: /');
        }

        $alertas = [];
        $id = $_GET['id'];

        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /admin/usuarios');
        }

        $empleados = Empleados::find($id);

        if (!$empleados) {
            header('Location: /admin/usuarios');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $empleados->sincronizar($_POST);

            $alertas = $empleados->validar();

            if (empty($alertas)) {

                $resultado = $empleados->guardar();

                if ($resultado) {
                    header('Location: /admin/usuarios');
                }
            }
        }


        $router->render('admin/usuarios/editar', [
            'titulo' => 'Editar empleado',
            'alertas' => $alertas,
            'empleados' => $empleados,
            'nombre' => $_SESSION['nombre'],
            'admin' => $_SESSION['admin']
        ]);
    }

    public static function eliminar()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!isAuth()) {
                header('Location: /');
            }

            $id = $_POST['id'];

            $id = filter_var($id, FILTER_VALIDATE_INT);

            if (!$id) {
                header('Location: /admin/usuarios');
            }

            $empleados = Empleados::find($id);

            if (!isset($empleados)) {
                header('Location; /admin/usuarios');
            }

            $resultado = $empleados->eliminar();
            if ($resultado) {
                header('Location: /admin/usuarios');
            }
        }
    }
}
