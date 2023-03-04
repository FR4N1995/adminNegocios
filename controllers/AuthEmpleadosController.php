<?php

namespace Controllers;

use Model\Empleados;
use MVC\Router;

class AuthEmpleadosController
{


    public static function loginEmpleado(Router $router)
    {

        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $empleado = new Empleados($_POST);
            // debuguear($empleado);
            $alertas = $empleado->validarLoginEmpleado();

            if (empty($alertas)) {
                $empleado = Empleados::where('telefono', $empleado->telefono);
                //validar que exista un registro de quien pago el plan
                //tambien comprobar que la fecha le permita ingresar
                if (!$empleado) {
                    Empleados::seterrores('error', 'El Empleado no Existe');
                } else {
                    if ($_POST['telefono'] === $empleado->telefono) {
                        session_start();
                        $_SESSION['nombre'] = $empleado->nombre;
                        $_SESSION['id'] = $empleado->id_usuario;
                        $_SESSION['admin'] = $empleado->admin;

                        header('Location: /admin/dashboard');
                    } else {
                        Empleados::seterrores('error', 'La contraseña es incorrecta');
                    }
                }
            }
        }
        $alertas = Empleados::getErrores();
        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesion',
            'alertas' => $alertas
        ]);
    }
}
