<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controller\PaginasController;
use Controller\LoginController;
use Controller\PostController;

$router = new Router;

//-> Área Privada
$router->get('/admin', [PostController::class, 'index']);
$router->get('/blog/crear', [PostController::class, 'crear']);
$router->get('/blog/actualizar', [PostController::class, 'actualizar']);
$router->post('/blog/crear', [PostController::class, 'crear']);
$router->post('/blog/actualizar', [PostController::class, 'actualizar']);
$router->get('/blog/eliminar-post', [PostController::class, 'eliminar_post']);
$router->post('/blog/confirmar-eliminado', [PostController::class, 'confirmar_eliminado']);
$router->get('/blog/borrar-comentario', [PostController::class, 'borrar_comentario']);
$router->post('/blog/confirmar-borrado', [PostController::class, 'confirmar_borrado']);
$router->post('/entrada/like', [PostController::class, 'like_post']);

//-> Área Pública
$router->get('/', [PaginasController::class, 'index']);
$router->post('/', [PaginasController::class, 'index']);
$router->get('/portfolio', [PaginasController::class, 'portfolio']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->post('/blog/buscar', [PostController::class, 'buscar_post']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->post('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);
// $router->get('/cuestionario', [PaginasController::class, 'cuestionario']);
$router->post('/diagnostico', [PaginasController::class, 'diagnostico']);

//-> Login - Logout
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Recuperar Password
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);

// Crear Cuenta
$router->get('/crear-cuenta', [LoginController::class, 'crear']);
$router->post('/crear-cuenta', [LoginController::class, 'crear']);

// Confirmar Cuenta
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar_cuenta']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);

$router->comprobarRutas();