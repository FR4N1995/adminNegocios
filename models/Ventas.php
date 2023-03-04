<?php

namespace Model;

class Ventas extends ActiveRecord{

    protected static $tabla = 'ventas';
    protected static $columnasDB = ['id', 'nombre', 'fecha', 'hora', 'totalcompra', 'ventasusuario_id'];
    
    public $id;
    public $nombre;
    public $fecha;
    public $hora;
    public $totalcompra;
    public $ventasusuario_id;
    
    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->totalcompra = $args['totalcompra'] ?? '';
        $this->ventasusuario_id = $args['ventasusuario_id'] ?? '';


    }

}