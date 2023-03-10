<?php
session_start();
?>
<?php
echo $_SERVER['QUERY_STRING'];
echo $REQUEST_URI;
require_once __DIR__ . '/../includes/app.php';

use Controllers\ApiController;
use Controllers\AuthController;
use Controllers\AuthEmpleadosController;
use Controllers\CitasController;
use Controllers\CorteController;
use MVC\Router;
use Controllers\DashboardController;
use Controllers\GraficasController;
use Controllers\PaginasController;
use Controllers\PdfController;
use Controllers\ProductosController;
use Controllers\RegistroController;
use Controllers\SuperDashboardController;
use Controllers\UsuariosController;
use Controllers\VentasController;

$router = new Router();

//AUTH Rutas del Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

//AUTHEMPLEADOS LOGIN
$router->get('/loginEmpleado', [AuthEmpleadosController::class, 'loginEmpleado']);
$router->post('/loginEmpleado', [AuthEmpleadosController::class, 'loginEmpleado']);
//AUTH Rutas del registro
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);
//AUTH Rutas de olvide Password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);
//AUTH Rutas de restablecer
$router->get('/restablecer', [AuthController::class, 'restablecer']);
$router->post('/restablecer', [AuthController::class, 'restablecer']);

$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar', [AuthController::class, 'confirmar']);

//Registro de usuarios
$router->get('/finalizar-registro', [RegistroController::class, 'verificar']);
$router->post('/finalizar-registro/pagar', [RegistroController::class, 'pagar']);

//Paginas publicas
$router->get('/', [PaginasController::class, 'index']);
$router->get('/paquetes', [PaginasController::class, 'paquetes']);
$router->get('/preguntasFrecuentes', [PaginasController::class, 'preguntasFrecuentes']);
$router->get('/blog', [PaginasController::class, 'blog']);


//Admin Para los usuarios
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

//Productos Admin Usuarios
$router->get('/admin/productos', [ProductosController::class, 'index']);
$router->get('/admin/productos/crear', [ProductosController::class, 'crear']);
$router->post('/admin/productos/crear', [ProductosController::class, 'crear']);
$router->get('/admin/productos/editar', [ProductosController::class, 'editar']);
$router->post('/admin/productos/editar', [ProductosController::class, 'editar']);
$router->post('/admin/productos/eliminar', [ProductosController::class, 'eliminar']);

//Citas Admin Usuarios
$router->get('/admin/citas', [CitasController::class, 'index']);
$router->get('/admin/citas/crear', [CitasController::class, 'crear']);
$router->post('/admin/citas/crear', [CitasController::class, 'crear']);
$router->get('/admin/citas/editar', [CitasController::class, 'editar']);
$router->post('/admin/citas/editar', [CitasController::class, 'editar']);
$router->post('/admin/citas/eliminar', [CitasController::class, 'eliminar']);
$router->post('/admin/citas/editar_estado', [CitasController::class, 'editarestado']);

//Ventas Admin Usuarios(API)
$router->get('/admin/ventas', [VentasController::class, 'index']);
$router->post('/admin/ventas', [VentasController::class, 'index']);
$router->get('/admin/ventas/ventas', [VentasController::class, 'ventas']);
$router->post('/admin/ventas/ventas', [VentasController::class, 'ventas']);
// $router->get('/admin/ventas/totales', [VentasController::class, 'ventasTotales']);
// $router->post('/admin/ventas/totales', [VentasController::class, 'ventasTotales']);
$router->post('/admin/ventas/eliminar', [VentasController::class, 'eliminar']);



// usuarios Admin Usuarios(empleados)
$router->get('/admin/usuarios', [UsuariosController::class, 'index']);
$router->get('/admin/usuarios/crear', [UsuariosController::class, 'crear']);
$router->post('/admin/usuarios/crear', [UsuariosController::class, 'crear']);
$router->get('/admin/usuarios/editar', [UsuariosController::class, 'editar']);
$router->post('/admin/usuarios/editar', [UsuariosController::class, 'editar']);
$router->post('/admin/usuarios/eliminar', [UsuariosController::class, 'eliminar']);

//corte Admin usuarios
$router->get('/admin/corte', [CorteController::class, 'index']);
$router->get('/admin/corte/cortedia', [CorteController::class, 'ventas_dia']);
$router->post('/admin/corte/cortedia', [CorteController::class, 'ventas_dia']);
$router->get('/admin/corte/corteempleado', [CorteController::class, 'ventasempleado']);
$router->post('/admin/corte/corteempleado', [CorteController::class, 'ventasempleado']);
$router->get('/admin/corte/cortefecha', [CorteController::class, 'ventaFechas']);
$router->post('/admin/corte/cortefecha', [CorteController::class, 'ventaFechas']);

//Rutas Para generar el pdf de los cortes;
$router->get('/admin/corte/cortedia/pdf',[PdfController::class, 'pdfDia']);
$router->post('/admin/corte/cortedia/pdf',[PdfController::class, 'pdfDia']);
$router->get('/admin/corte/cortefecha/pdf', [PdfController::class, 'pdfFechas']);
$router->post('/admin/corte/cortefecha/pdf', [PdfController::class, 'pdfFechas']);
$router->get('/admin/corte/corteempleado/pdf', [PdfController::class, 'pdfEmpleado']);
$router->post('/admin/corte/corteempleado/pdf', [PdfController::class, 'pdfEmpleado']);

//estadisticas Admin Usuarios
$router->get('/admin/graficas',[GraficasController::class, 'index']);
$router->get('/api/graficas/productos', [GraficasController::class, 'graficaProductos']);

//api para el modal de productos
$router->get('/api/productos',[ApiController::class, 'showProducts']);
$router->get('/api/citas', [ApiController::class, 'showCitas']);

//Admin para mi
$router->get('/superadmin/dashboard', [SuperDashboardController::class, 'index']);
$router->get('/superadmin/usuariosadmin', [SuperDashboardController::class, 'usuariosAdmin']);
$router->post('/superadmin/usuariosadmin/eliminar', [SuperDashboardController::class, 'eliminaruser']);
$router->get('/superadmin/registrados', [SuperDashboardController::class, 'registrados']);
$router->post('/superadmin/registrados/eliminar', [SuperDashboardController::class, 'eliminarRegistro']);

$router->comprobarRutas();





