<?php

namespace Controllers;

use Model\Registro;
use MVC\Router;

class RegistroController
{

    public static function verificar(Router $router)
    {
        if (!isAuth()) {
            header('Location: /');
        }
        $fechaActual = date('Y-m-d');
        //Aqui aremos al verificacion de que exista un registro(pago)
        //tambien 
      
        //verificar si el usuario ya hizo un registro
        //Aqui va un whereArray
        $registro = Registro::wherearray(['usuarioid' => $_SESSION['id'], 'activo' => '1']);
        // debuguear($registro);
        //  Aqui me muestra error al querer obtener la fecha de inicio y la fecha final
        // debuguear($registro);
        if (isset($registro[0])) {
            if ($fechaActual >= $registro[0]->fecha_inicio && $fechaActual <= $registro[0]->fecha_final) {
                header('Location: /admin/dashboard');
            }
            
        }
       

        $router->render('registro/finalizar-registro', [
            'titulo' => 'Finalizar Registro'
        ]);
    }

    public static function pagar()
    {

        // debuguear($_POST);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isAuth()) {
                header('Location: /');
            }

            $fecha_actual = date('Y-m-d');
            $fecha_final = date('Y-m-d');

            if (empty($_POST)) {
                echo json_encode([]);
                return;
            }

            if ($_POST['tiempo_id'] === '1') {
                $fecha_final = date("Y-m-d", strtotime($fecha_actual . "+ 1 month"));
            } elseif ($_POST['tiempo_id'] === '2') {
                $fecha_final = date("Y-m-d", strtotime($fecha_actual . "+ 1 year"));
            }

            //si ya hay un registro con ese usuario y va a pagar por que se le termino el tiempo
            //modificar la fecha de inicio y final de ese registro

            //aqui deberia ir la modificacion del registro ya existente
             $registroExistente = Registro::wherearray(['usuarioid' => $_SESSION['id'], 'activo' => '1']);
            
             foreach($registroExistente as $registroExist){
                $registroExist->activo = '0';
                $registroExist->guardar();
             }


            $datos = $_POST;
            $datos['token'] = substr(md5(uniqid(rand(), true)), 0, 8);
            //falta poner el de la sesion
            $datos['usuarioid'] = $_SESSION['id'];
            $datos['fecha_inicio'] = $fecha_actual;
            $datos['fecha_final'] = $fecha_final;
            //  debuguear($datos);


            

            try {
                $registro = new Registro($datos);
                debuguear($registro);
                $resultado = $registro->guardar();
                echo json_encode($resultado);
            } catch (\Throwable $th) {
                echo json_encode([
                    'resultado' => 'Algo salio mal con tu pago'
                ]);
            }
        }
    }
}
