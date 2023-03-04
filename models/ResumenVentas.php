<?php

namespace Model;

class ResumenVentas extends ActiveRecord{

    protected static $tabla = 'ventasservicio';
    protected static $columnasDB = ['id', 'ventaid', 'cantidad', 'nombre', 'fecha', 'hora', 'subtotal', 'productos', 'precio' ];


    public $id;
    public $ventaid;
    public $cantidad;
    public $nombre;
    public $fecha;
    public $hora;
    public $productos;
    public $precio;
    public $subtotal;


    public function __construct()
    {
        $this->id = $args['id'] ?? null;
        $this->id = $args['ventaid'] ?? null;
        $this->cantidad = $args['cantidad'] ?? '';
        $this->subtotal = $args['subtotal'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->productos = $args['productos'] ?? '';
        $this->precio = $args['precio'] ?? '';


    }




}