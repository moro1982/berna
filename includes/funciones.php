<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR);

function incluirTemplate( string $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/{$nombre}.php";
}

function estaAutenticado() {
    session_start();
    if (!$_SESSION['login']) {
        header("Location: /");
    }
}

// Función que verifique si el Usuario está Autenticado
function isAuth() : void {
    if ( !isset($_SESSION['login']) ) {
        header('Location: /');
    }
}

function isAdmin() : void {
    if ( !isset($_SESSION['admin']) ) {
        header('Location: /');
    }
}

function debuguear($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//-> Escapar / Sanitizar el HTML
function sanitizar($html) : string {
    $san = htmlspecialchars($html);
    return $san;
}

//-> Mostrar los mensajes de alerta
function mostrarNotificacion($codigo) {
    $mensaje = '';
    switch ($codigo) {
        case 1:
            $mensaje = 'Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado Correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

// Busca y filtra el ID del $_GET, sino existe, redirige a la URL que le pasamos de argumento.
function validarORedireccionar(string $url) {
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if (!$id) {
        header( "Location: {$url}" );
    }
    return $id;
}

function validarDatosContacto($datosForm) {
    $alertas = [];
    
    if (!$datosForm['first-name']) {
        $alertas['error'][] = "Debes añadir un Nombre";
    }
    if (!$datosForm['last-name']) {
        $alertas['error'][] = "Debes añadir un Apellido";
    }
    if (!$datosForm['e-mail']) {
        $alertas['error'][] = "Debes añadir un E-mail";
    }

    return $alertas;
}