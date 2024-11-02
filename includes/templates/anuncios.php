<?php

use App\Propiedad;

if ($_SERVER['SCRIPT_NAME'] === '/houseSales/anuncios.php') {
    $propiedades = Propiedad::all();
} else {
    $propiedades = Propiedad::get($limite);
}
?>

<div class="contenedor-anuncios">
    <!-- Iterar y mostrar los registros de propiedades de la base de datos -->
    <?php foreach ($propiedades as $propiedad) { ?>
        <div class="anuncio">

            <img src="imagenes/<?php echo $propiedad->imagen; ?>" width="200" height="300" alt="Anuncio" loading="lazy" />

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>

                <p>
                    <!-- Reduciendo la descripcion a 220 caracteres o menos en la pagina principal -->
                    <?php if (strlen($propiedad->descripcion) > 220) {
                        echo substr($propiedad->descripcion, 0, 220); ?>

                        <a href="anuncio.php?id=<?php echo $propiedad->id; ?>" class="read-more">Leer mas</a>
                    <?php } else {
                        echo $propiedad->descripcion;
                    }
                    ?>
                </p>

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

                        <p><?php echo $propiedad->habitaciones ?></p>
                    </li>
                </ul>
                <!--.iconos-caracteristicas-->

                <a href="anuncio.php?id=<?php echo $propiedad->id; ?>" class="btn-amarillo-block">
                    Ver Propiedad
                </a>
            </div>
            <!--.contenido-anuncio-->
        </div>
        <!--.anuncio-->
    <?php } ?>
</div>
<!--.contenedor-anuncios-->