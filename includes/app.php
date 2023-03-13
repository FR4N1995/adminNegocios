<?php
// echo phpinfo();


require  '../vendor/autoload.php';
//aqui ubicamos el archivo .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
require 'funciones.php';
require 'database.php';
require '../libraries/fpdf/fpdf.php';

use Model\ActiveRecord;
ActiveRecord::setDB($db);