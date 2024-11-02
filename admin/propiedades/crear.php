<?php

require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

// Verifica si el usuario inicio sesion, si no lo hizo lo redirecciona al ./index.php
estaAutenticado();

$propiedad = new Propiedad;

// Consulta para obtener todos los vendedores
$vendedores = Vendedor::all('vendedores');

// Arreglo con mensajes de errores
$errores = Propiedad::getErrores();

// Ejecuta el codigo despues de que el usuario envia el formulario
if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    // Creando una nueva instancia
    $propiedad = new Propiedad($_POST['propiedad']);

    /* SUBIDA DE ARCHIVOS */
    // Generar un nombre unico a las imagenes
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // Revisa si hay una imagen subida en el almacenamiento temporal 
    if ($_FILES['propiedad']['tmp_name']['imagen']) {

        // Cambiando el tamaño de la imagen (resize) con intervention image
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    // Validacion del formulario
    $errores = $propiedad->validar();

    // Revisa que el arreglo de errores esta vacio
    if (empty($errores)) {

        // Crea la carpeta para las imagenes, si esta no existe
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        // Guardando la imagen en el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        // Creando una nueva propiedad en la BD
        $propiedad->guardar();
    }
}


incluirTemplate('header');
?>

<main class="contenedor seccion contenido-agrupado">
    <h2>Crear Nueva Propiedad</h2>

    <a href="/houseSales/admin/index.php" class="boton btn-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <!-- GET: Se usa para obtener datos de un servidor y mostrarlos en la url -->
    <!-- POST: Se utiliza para enviar datos al servidor de forma segura, sin exponer la informacion -->
    <form class="formulario" method="POST" action="/houseSales/admin/propiedades/crear.php" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_propiedades.php' ?>

        <input type="hidden" name="propiedad[registro]" value="propiedad">

        <div class="alinear-derecha">
            <input type="submit" value="Crear Propiedad" class="boton btn-verde">
        </div>
    </form>
</main>

<?php

incluirTemplate('footer');
?>