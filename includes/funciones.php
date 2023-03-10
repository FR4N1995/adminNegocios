<?php

define('CARPETAS_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/img/products/' );



function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//escapa y saniza el html
function s($html): string {
    $s = htmlspecialchars($html);
    return $s;
}

function esUltimo($actual, $proximo){
    if ($actual !== $proximo) {
        return true;
    }
    return false;
}

//funcion que revisa que el usuario esta autenticado
// function isAuth() {
//     if (!isset($_SESSION['login'])) {
//         header('Location: /login');
//     }
// }

function isAuth() : bool {
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['nombre']) && !empty($_SESSION);
}

function isAdmin(): bool {
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['admin']) && !empty($_SESSION['admin']);
}

function isSuperAdmin(): bool {
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['superadmin']) && !empty($_SESSION['superadmin']);
}

// function isAdmin() {
//     if (!isset($_SESSION['admin'])) {
//         header('Location: /');
//     }

// }
function pagina_actual($path){
    //$currentUrl = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
    //return str_contains($_SERVER['PATH_INFO'] ?? '/', $path) ? true : false;
    return str_contains($_SERVER['REQUEST_URI'] ?? '/',$path) ? true : false;
}
//Funcion para que tome una animacion
function aos_animacion() {
    $efectos = ['fade-up', 'fade-down', 'fade-right', 'flip-left', 'flip-right', 'zoom-in', 'zoom-in-up', 'zoom-in-down', 'zoom-out'];
    $efecto = array_rand($efectos, 1);
    echo $efectos[$efecto];
}

//Necesarias Para Formatear la hora en español
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'spanish');
