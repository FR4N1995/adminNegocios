<?php

namespace Model;

class Productos extends ActiveRecord{

    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'nombre', 'precio', 'disponible', 'imagen', 'usuario_id'];

    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->disponible = $args['disponible'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->usuario_id = $args['usuario_id'] ?? '';
    }

    public function validar(){
        if (!$this->nombre || strlen(trim($this->nombre)) == 0) {
            self::$errores['error'][]= 'El nombre es Obligatorio';
        }
        if (!$this->precio || strlen(trim($this->precio)) == 0) {
            self::$errores['error'][]= 'El precio es Obligatorio';
        }
        if (!$this->disponible || strlen(trim($this->disponible)) == 0) {
            self::$errores['error'][]= 'La disponibilidad del producto es obligatoria';
        }
        if (!$this->imagen) {
            self::$errores['error'][]= 'La imagen es obligatoria';
        }
        return self::$errores;
    }



}