<?php

require '../../includes/app.php';

// Importando la clase vendedor
use App\Vendedor;

estaAutenticado();

// Verificando que el id sea valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /houseSales/admin/index.php');
}

// Obteniendo el arreglo de vendedor desde la BD
$vendedor = Vendedor::find($id);

// Importando el arreglo de errores vacio
$errores = Vendedor::getErrores();

// Ejecuta el codigo despues de que el usuario envia el formulario
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    // Asignando las actualizaciones del usuario
    $args = $_POST['vendedor'];

    // Sincronizando el objeto en memoria con los cambios del usuario
    $vendedor->sincronizar($args);

    // Validando
    $errores = $vendedor->validar();

    if (empty($errores)) {
        $vendedor->guardar();
    }
}

incluirTemplate('header');

?>

<main class="contenedor seccion contenido-agrupado">
    <h2>Actualizar Vendedor(a)</h2>

    <a href="/houseSales/admin/index.php" class="boton btn-verde m-bottom">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <!-- GET: Se usa para obtener datos de un servidor y mostrarlos en la url -->
    <!-- POST: Se utiliza para enviar datos al servidor de forma segura, sin exponer la informacion -->
    <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_vendedores.php' ?>

        <div class="alinear-derecha">
            <input type="submit" value="Guardar Cambios" class="boton btn-verde">
        </div>
    </form>
</main>

<?php

incluirTemplate('footer');
?>