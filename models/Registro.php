<?php

namespace Model;


class Registro extends ActiveRecord{

    protected static $tabla = 'registros';
    protected static $columnasDB = ['id', 'paquete_id', 'pago_id', 'token', 'activo', 'usuarioid', 'tiempo_id', 'fecha_inicio', 'fecha_final'];


    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? null;
        $this->paquete_id = $args['paquete_id'] ?? '';
        $this->pago_id = $args['pago_id'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->activo = $args['activo'] ?? '1';
        $this->usuarioid = $args['usuarioid'] ?? '';
        $this->tiempo_id = $args['tiempo_id'] ?? '';
        $this->fecha_inicio = $args['fecha_inicio'] ?? '';
        $this->fecha_final = $args['fecha_final'] ?? '';
    }


}