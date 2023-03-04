<?php

namespace Model;

class VentasProductos extends ActiveRecord{

    protected static $tabla = 'ventasproductos';
    protected static $columnasDB = ['id', 'subtotal', 'cantidad', 'ventas_id', 'productos_id'];
    

    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? null;
        $this->subtotal = $args['subtotal'] ?? '';
        $this->cantidad = $args['cantidad'] ?? '';
        $this->ventas_id = $args['ventas_id'] ?? '';
        $this->productos_id = $args['productos_id'] ?? '';


    }

}