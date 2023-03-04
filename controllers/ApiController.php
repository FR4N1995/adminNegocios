<?php

namespace Controllers;

use Model\Citas;
use Model\Productos;

class ApiController
{


    public static function showProducts()
    {
        if (!isAuth()) {
            header('Location: /');
        }
        $id = $_GET['id'];
        $Producto = Productos::find($id);
        echo json_encode($Producto);

    }


    public static function showCitas(){
        if (!isAuth()) {
            header('Location: /');
        }
        $id = $_GET['id'];
        $citas = Citas::find($id);
        echo json_encode($citas);


    }
}
