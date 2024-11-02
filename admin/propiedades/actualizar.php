<?php

require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

// Verifica si el usuario inicio sesion, si no lo hizo lo redirecciona al ./index.php
estaAutenticado();

// Validando la URL por un ID valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /houseSales/admin/index.php');
}

// Obteniendo los datos de la propiedad
$propiedad = Propiedad::find($id);

// Consulta para obtener todos los vendedores
$vendedores = Vendedor::all();

// Arreglo con mensajes de errores
$errores = Propiedad::getErrores();

// Ejecuta el codigo despues de que el usuario envia el formulario
if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    // Asignando los atributos
    $args = $_POST['propiedad'];

    // Llamando el metodo para sincronizar el objeto $propiedad con los cambios realizados por el usuario
    $propiedad->sincronizar($args);

    // Validacion del formulario
    $errores = $propiedad->validar();

    // Subida de Archivos
    // Generar un nombre unico a las imagenes
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // Revisa si hay una imagen subida en el almacenamiento temporal 
    if ($_FILES['propiedad']['tmp_name']['imagen']) {

        // Cambiando el tamaño de la imagen (resize) con intervention image
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    // Revisa que el arreglo de errores esta vacio
    if (empty($errores)) {

        // Verifica si hay una imagen subida en el almacenamiento temporal 
        if ($_FILES['propiedad']['tmp_name']['imagen']) {

            // Almacenando la imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);
        }

        // Actualizando la propiedad en la BD
        $propiedad->guardar();
    }
}

incluirTemplate('header');
?>

<main class="contenedor seccion contenido-agrupado">
    <h2>Actualizar Propiedad</h2>

    <a href="/houseSales/admin/index.php" class="boton btn-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <!-- GET: Se usa para obtener datos de un servidor y mostrarlos en la url -->
    <!-- POST: Se utiliza para enviar datos al servidor de forma segura, sin exponer la informacion -->
    <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_propiedades.php' ?>

        <div class="alinear-derecha">
            <input type="submit" value="Actualizar Propiedad" class="boton btn-verde">
        </div>
    </form>
</main>

<?php

incluirTemplate('footer');
?>