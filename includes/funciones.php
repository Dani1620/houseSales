<?php

// __DIR__ Es una super global que nos genera la ruta completa del archivo en el que se utilice
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . '/funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/{$nombre}.php";
}


function estaAutenticado()
{
    session_start();

    if (!$_SESSION['login']) {
        header('Location: /houseSales/index.php');
    }
}

function debuguear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";

    exit;
}

// Escapar y Sanitizar el HTML
function sani($html): string
{
    $sani = htmlspecialchars($html);

    return $sani;
}

// Validar tipo de contenido
function validarTipoRegistro($tipo)
{
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}

// Muestra los mensajes de alertas
function mostrarNotificacion($codigo)
{
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = 'Anuncio Creado Correctamente';
            break;

        case 2:
            $mensaje = 'Anuncio Actualizado Exitosamente';
            break;

        case 3:
            $mensaje = 'Anuncio Eliminado Correctamente';
            break;

        case 4:
            $mensaje = 'Vendedor/a Creado/a Correctamente';
            break;

        case 5:
            $mensaje = 'Vendedor/a Actualizado/a Exitosamente';
            break;

        case 6:
            $mensaje = 'Vendedor/a Eliminado/a Correctamente';
            break;

        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}
