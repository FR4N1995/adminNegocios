<?php


require  '../vendor/autoload.php';
require 'funciones.php';
require 'database.php';
require '../libraries/fpdf/fpdf.php';







use Model\ActiveRecord;
ActiveRecord::setDB($db);