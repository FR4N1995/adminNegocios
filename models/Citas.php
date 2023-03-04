<?php

namespace Model;

class Citas extends ActiveRecord{

    protected static $tabla = 'citas';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'asunto', 'fecha', 'hora', 'estado', 'usuario_id'];

   
    
    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->asunto = $args['asunto'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->estado = $args['estado'] ?? 0 ;
        $this->usuario_id = $args['usuario_id'] ?? '';
    }

    public function validarCita(){

        if (!$this->nombre || strlen(trim($this->nombre)) == 0) {
            self::$errores['error'][]= 'El nombre es Obligatorio';
        }
        if (!$this->apellido || strlen(trim($this->apellido))== 0) {
            self::$errores['error'][] = 'El apellido es obligatorio';
        }
        if (!$this->asunto || strlen(trim($this->asunto))==0) {
            self::$errores['error'][] = 'Es necesario escribir un asunto';
        }
        if (!$this->fecha || strlen(trim($this->fecha))==0) {
            self::$errores['error'][] = 'La fecha es obligatoria';
        }
        if (!$this->hora || strlen(trim($this->hora))==0) {
            self::$errores['error'][] = 'La hora es obligatoria';
        }

        return self::$errores;
    }





}