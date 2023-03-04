<?php 

namespace Controllers;


use MVC\Router;
use Classes\Email;
use Model\Usuarios;


class AuthController{

    public static function login(Router $router){
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarios = new Usuarios($_POST);

            $alertas = $usuarios->validarFormularioLogin();

            if (empty($alertas)) {
                //verificamos que el usuario exista o no
                $usuarios = Usuarios::where('email', $usuarios->email);

                if (!$usuarios || !$usuarios->confirmado) {
                     //Si el usuario no existe o no esta confirmado mandamos este mensaje
                     Usuarios::setErrores('error', 'El usuario no Existe o No esta confirmado');
                } else{
                    //El usuario se encuentra en la base de datos
                    if (password_verify($_POST['password'], $usuarios->password)) {
                        //La contraseña es correcta y existe el usuario
                        //Ahora iniciamos session del usuario
                        session_start();
                        //llenamos el arreglo de session con datos del usuario
                        //como si id, nombre etc
                        $_SESSION['id'] = $usuarios->id;
                        $_SESSION['nombre'] = $usuarios->nombre;
                        $_SESSION['apellido'] = $usuarios->apellido;
                        $_SESSION['email'] = $usuarios->email;
                        $_SESSION['admin'] = $usuarios->admin;
                        $_SESSION['confirmado'] = $usuarios->confirmado;
                        $_SESSION['superadmin'] = $usuarios->superadmin ?? null;

                        if ($usuarios->superadmin) {
                            header('Location: /superadmin/dashboard');
                        }else{
                            header('Location: /finalizar-registro');
                        }
                    }else{
                        //El correo es correcto pero la contraseña es incorrecta
                        Usuarios::setErrores('error', 'La contraseña en incorrecta');
                    }
                }
            }

        }

        $alertas = Usuarios::getErrores();
        $router->render('auth/login', [
            'titulo' => 'iniciar Sesion',
            'alertas' => $alertas
        ]);

    }

    public static function registro(Router $router){
        $usuarios = new Usuarios;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarios->sincronizar($_POST);

            $alertas = $usuarios->validarFormulario();

            if (empty($alertas)) {
                
                $usuariosExiste = Usuarios::where('email', $usuarios->email);

                if ($usuariosExiste) {
                    // si ya existe mandamos una alerta al usuario
                   Usuarios::seterrores('error', 'El Usuario ya esta Registrado');
                   $alertas = Usuarios::getErrores();
                }else{
                    $usuarios->hashearPassword();
                    //Elimiar password2
                    unset($usuarios->password2);
                    //generar el Token
                    $usuarios->crearToken();
                    // debuguear($usuarios);
                    //crear nuevo usuario
                    $resultado = $usuarios->guardar();
                    //enviar Email para que confirme su cuenta
                    $email = new Email($usuarios->email, $usuarios->nombre, $usuarios->token);
                    $email->enviarconfirmacion();
                    if ($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }

        }

        $router->render('auth/registro', [
            'titulo'=> 'Crear Cuenta',
            'alertas' => $alertas,
            'usuarios' => $usuarios
        ]);
    }

    public static function olvide(Router $router){
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarios = new Usuarios($_POST);
            $alertas = $usuarios->validarEmail();

            if (empty($alertas)) {
                //buscamos en la base de datos al usuario, por el email
                $usuarios = Usuarios::where('email', $usuarios->email);

                //si existe y esta confirmado el usuario
                if ($usuarios && $usuarios->confirmado === "1") {
                    //generamos un nuevo token
                    $usuarios->crearToken();
                    unset($usuarios->password2);

                    //Actualizamos el usuario en la base de datos
                    $usuarios->guardar();
                    // debuguear($usuarios);

                    //Enviamos el correo para que pueda ingresar su nueva contraseña
                    $email = new Email($usuarios->email, $usuarios->nombre, $usuarios->token);
                    $email->restablecerPassword();

                    Usuarios::seterrores('exito', 'Enviamos las instrucciones a tu correo Electronico');
                }else{
                    Usuarios::seterrores('error', 'El usuario no Existe o no esta Confirmado');
                }

            }
        }
        $alertas = Usuarios::getErrores();
        $router->render('auth/olvide', [
            'titulo' => 'Restablecer Password',
            'alertas' => $alertas
        ]);
    }


    public static function restablecer(Router $router){
        //primero obtenemos el token de la url
        $token = s($_GET['token']);
        $alertas = [];
        $tokenValido = true;
        if (!$token) {
            header('Location: /');
        }

        $usuarios = Usuarios::where('token', $token);
        //  debuguear($usuarios);
        if (empty($usuarios)) {
            Usuarios::seterrores('error', 'Token no Valido');
            $tokenValido = false;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Sincronisamos para añadir el nuevo password
            $usuarios->sincronizar($_POST);

            //validamos password
            $alertas = $usuarios->validarPassword();

            if (empty($alertas)) {
                //hasheamos el nuevo password
                $usuarios->hashearPassword();
                //eliminamos el token
                $usuarios->token = null;
                //actualizamos el password del usuario en la base de datos
                $resultado = $usuarios->guardar();

                if ($resultado) {
                    header('Location: /');
                }
            }

        }

        $alertas = Usuarios::getErrores();
        $router->render('auth/restablecer', [
            'titulo' => 'Nueva Password',
            'alertas' => $alertas,
            'tokenValido' => $tokenValido
        ]);
    }

    public static function logout(){
        session_start();
        $_SESSION = [];
        header('Location: /');
    }

    public static function mensaje(Router $router){

        $router->render('auth/mensaje',[
            'titulo' => 'Cuenta Creada'
        ]);
    }

    public static function confirmar(Router $router){
        $token = s($_GET['token']);

        if(!$token){
            header('Location: /');
        }
        //Debemos encontrar el usuario que tiene ese token
        $usuarios = Usuarios::where('token', $token);
        if (empty($usuarios)) {
            Usuarios::setErrores('error', 'Token NO valido');
        }else{
            //lo que hacemos aqui es modificar el usuarion que ya tenemos en la base de datos
            //Re escribimos al usuario y lo buscamos mediante el token que se manda por la url
            $usuarios->confirmado= 1;
            $usuarios->token = null;
            unset($usuarios->password2);

            $usuarios->guardar();
            Usuarios::setErrores('exito', 'Cuenta Comprobada Correctamente');

        }
        $alertas = Usuarios::getErrores();

        $router->render('auth/confirmar', [
            'titulo' => 'Confirma Cuenta',
            'alertas' => $alertas
        ]);
    }


}