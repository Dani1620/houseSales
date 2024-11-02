<?php

require '../includes/app.php';

// Importando las clases
use App\Propiedad;
use App\Vendedor;

// Verifica si el usuario inicio sesion, si no lo hizo lo redirecciona al ./index.php
estaAutenticado();

// Implementando un metodo para obtener todas las propiedades
$propiedades = Propiedad::all();

$vendedores = Vendedor::all();

// ??: Busca el valor de resultado en la url, pero si no lo encuentra le agrega null
$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validando el id
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {

        $type = $_POST['registro'];

        // Verificando si el contenido a eliminar es valido (vendedor o propiedad)
        if (validarTipoRegistro($type)) {
            // Comprobando lo que vamos a eliminar
            if ($type === 'propiedad') {

                // Obteniendo el registro de la propiedad a eliminar
                $propiedad = Propiedad::find($id);

                $propiedad->eliminar($type);
            } else if ($type === 'vendedor') {

                // Obteniendo el registro del vendedor a eliminar
                $vendedor = Vendedor::find($id);

                $vendedor->eliminar($type);
            }
        }
    }
}

// Incluyendo un template
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-agrupado">
    <h2>Administrador de Bienes Raices</h2>

    <?php
    $mensaje = mostrarNotificacion(intval($resultado));

    if ($mensaje) { ?>
        <div class="alerta exito crud">
            <?php echo sani($mensaje); ?>
        </div>
    <?php } ?>


    <div class="alinear-derecha">
        <a href="/houseSales/admin/propiedades/crear.php" class="boton btn-verde">Nueva Propiedad</a>
        <a href="/houseSales/admin/vendedores/crear.php" class="boton btn-yellow">Agregar Vendedor</span></a>
    </div>

    <h2>Propiedades</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <!-- Mostrar los resultados de la consulta en la BD -->
            <?php foreach ($propiedades as $propiedad) : ?>

                <tr>
                    <td class="text-center"><?php echo $propiedad->id; ?></td>
                    <td class="text-center"><?php echo $propiedad->titulo; ?></td>
                    <td><img src="../imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla" alt="table picture"></td>
                    <td class="text-center size">$ <?php echo $propiedad->precio; ?></td>

                    <td class="d-grid mb-2">
                        <div class="reducir-width">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                                <input type="hidden" name="registro" value="propiedad">
                                <input type="submit" class="btn-rojo-block adjust-padding" value="Eliminar">
                            </form>

                            <a href="/houseSales/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="btn-amarillo-block adjust-padding">Actualizar</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Vendedores</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <!-- Mostrar los resultados de la consulta en la BD -->
            <?php foreach ($vendedores as $vendedor) : ?>

                <tr>
                    <td class="text-center"><?php echo $vendedor->id; ?></td>
                    <td class="text-center"><?php echo $vendedor->nombre . " " . $vendedor->apellido ?></td>
                    <td class="text-center size"><?php echo $vendedor->telefono; ?></td>

                    <td class="d-grid mb-2">
                        <div class="reducir-width">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                                <input type="hidden" name="registro" value="vendedor">

                                <input type="submit" class="btn-rojo-block adjust-padding" value="Eliminar">
                            </form>
                        </div>

                        <a href="/houseSales/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="btn-amarillo-block adjust-padding">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php

incluirTemplate('footer');
?>