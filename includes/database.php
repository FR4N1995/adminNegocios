<?php

// try {
//     $db = mysqli_connect('localhost:3306', 'phpymyadmin', 'root', 'admin_negocios');
// } catch (\Throwable $th) {
//     echo $th;
// }

$db = mysqli_connect('localhost', 'root', '', 'admin_negocios');
if (!$db) {
     echo "Error: No se pudo conectar a MySQL.";
     echo "errno de depuración: " . mysqli_connect_errno();
     echo "error de depuración: " . mysqli_connect_error();
     exit;
 }
