<?php

namespace Model;

class Empleados extends ActiveRecord{
    protected static $tabla =  'empleados';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'admin', 'id_usuario'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $admin;
    public $id_usuario;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? '';
        $this->id_usuario = $args['id_usuario'] ?? '';
    }


    public function validar(){
        if (!$this->nombre) {
            self::$errores['error'][] = 'El nombre es Obligatorio';
        }
        if (!$this->apellido) {
            self::$errores['error'][] = 'Al menos un Apellido';
        }
        if (strlen($this->telefono) < 10) {
            self::$errores['error'][] = 'Un numero valido debe tener al menos 10 digitos';
        }
        if (!$this->telefono) {
            self::$errores['error'][] = 'El numero es obligatorio';
        }
        
        return self::$errores;
    }

    public function validarLoginEmpleado(){
        if (!$this->nombre) {
            self::$errores['error'][] = 'El nombre es Obligatorio';
        }
        if (!$this->telefono) {
            self::$errores['error'][] = 'El Telefono no puede ir vacio';
        }
        return self::$errores;
    }
}