<?php
require './includes/app.php';

use App\Propiedad;

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

// Revisando si no hay un id valido de tipo int
if (!$id) {
  header('Location: /houseSales/index.php');
}

$propiedad = Propiedad::find($id);


incluirTemplate('header');

?>

<main class="contenedor seccion contenido-centrado">
  <!-- Mostrando los datos de la propiedad  -->

  <h2><?php echo $propiedad->titulo; ?></h2>

  <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen de la Propiedad" />

  <div class="resumen-propiedad">
    <p class="precio"><?php echo $propiedad->precio; ?></p>

    <ul class="iconos-caracteristicas">
      <li>
        <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" />

        <p><?php echo $propiedad->wc; ?></p>
      </li>

      <li>
        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />

        <p><?php echo $propiedad->estacionamiento; ?></p>
      </li>

      <li>
        <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" />

        <p><?php echo $propiedad->habitaciones; ?></p>
      </li>
    </ul>
    <!--.iconos-caracteristicas-->

    <p><?php echo $propiedad->descripcion; ?></p>
  </div>
</main>

<?php

incluirTemplate('footer');

?>