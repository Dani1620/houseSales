<?php

require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

$vendedor = new Vendedor;

// Importando el arreglo de errores vacio
$errores = Vendedor::getErrores();

// Ejecuta el codigo despues de que el usuario envia el formulario
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    // Creando una nueva instancia de un vendedor
    $vendedor = new Vendedor($_POST['vendedor']);

    // Validando que no haya campos vacios
    $errores = $vendedor->validar();

    // Si no hay errores
    if (empty($errores)) {

        // Agregando un nuevo vendedor en la BD
        $vendedor->guardar();
    }
}

incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h2>Registrar Nuevo Vendedor(a)</h2>

    <a href="/houseSales/admin/index.php" class="boton btn-verde m-bottom">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <!-- GET: Se usa para obtener datos de un servidor y mostrarlos en la url -->
    <!-- POST: Se utiliza para enviar datos al servidor de forma segura, sin exponer la informacion -->
    <form class="formulario" method="POST">

        <?php include '../../includes/templates/formulario_vendedores.php' ?>

        <input type="hidden" name="vendedor[registro]" value="vendedor">

        <div class="alinear-derecha">
            <input type="submit" value="Registrar Vendedor(a)" class="boton btn-verde">
        </div>
    </form>
</main>

<?php

incluirTemplate('footer');
?>