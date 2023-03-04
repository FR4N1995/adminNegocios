<?php

namespace Model;

class Usuarios extends ActiveRecord{

    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password', 'token', 'confirmado', 'admin', 'superadmin'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $password2;
    public $password_actual;
    public $password_nuevo;
    public $admin;
    public $superadmin;
    public $confirmado;
    public $token;

    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->password_actual = $args['password_actual'] ?? '';
        $this->password_nuevo = $args['password_nuevo'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->admin = $args['admin'] ?? '1';
        $this->superadmin = $args['superadmin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? 0;
    }


       //validamos que en los inputs tenga un nombre y email 
       public function validarFormulario(){
        if(!$this->nombre){
            self::$errores['error'][]= 'El nombre es obligatorio';
        }
        if(!$this->apellido){
            self::$errores['error'][]= 'debes ingresar al menos un Apellido';
        }
        if(!$this->email){
            self::$errores['error'][]= 'El email es obligatorio';
        }
        if(!$this->password){
            self::$errores['error'][]= 'El password no debe ir vacio';
        }
        if(strlen($this->password) < 6){
            self::$errores['error'][]= 'El password debe tener al menos 6 caracteres';
        }
        if($this->password !== $this->password2){
            self::$errores['error'][]= 'Las contraseñas deben ser iguales';
        }
        return self::$errores;

    }

    public function validarFormularioLogin(){
        if(!$this->email){
            self::$errores['error'][]= 'El email es obligatorio';
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$errores['error'][]= 'Email No Valido';
        }
        if(!$this->password){
            self::$errores['error'][]= 'El password no debe ir vacio';
        }
        return self::$errores;
    }

    //Validamos el email
    public function validarEmail(){
        if (!$this->email) {
            self::$errores['errores'][]='El email es Obligatorio';
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$errores['error'][]= 'Email No Valido';
        }
        return self::$errores;
    }

    //Validar password  
    public function validarPassword(){
            if(!$this->password){
                self::$errores['error'][]= 'El password no debe ir vacio';
            }
            if(strlen($this->password) < 6){
                self::$errores['error'][]= 'El password debe tener al menos 6 caracteres';
            }
            return self::$errores;
    }


    //hashea la contraseña
    public function hashearPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

     //generar un Token
     public function crearToken(){
        $this->token = uniqid();
    }


}