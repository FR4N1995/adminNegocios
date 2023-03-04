<?php

namespace Model;

class Tiempo extends ActiveRecord{

    protected static $tabla = 'tiempo';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

}