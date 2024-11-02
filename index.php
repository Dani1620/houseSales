<?php
// Importando funciones, bases de datos y classes
require './includes/app.php';

incluirTemplate('header', $inicio = true);
?>

<main class="contenedor seccion">
  <h2>Acerca de Nosotros</h2>

  <div class="iconos-nosotros">
    <div class="icono">
      <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy" />

      <h3>Seguridad</h3>

      <p>
        Nunc fermentum pulvinar felis, sit amet facilisis enim imperdiet in.
        Nullam eleifend, nulla non tempor maximus, augue nibh facilisis magna.
      </p>
    </div>
    <!--.icono-->

    <div class="icono">
      <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy" />

      <h3>Precio</h3>

      <p>
        Nunc fermentum pulvinar felis, sit amet facilisis enim imperdiet in.
        Nullam eleifend, nulla non tempor maximus, augue nibh facilisis magna.
      </p>
    </div>
    <!--.icono-->

    <div class="icono">
      <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy" />

      <h3>A Tiempo</h3>

      <p>
        Nunc fermentum pulvinar felis, sit amet facilisis enim imperdiet in.
        Nullam eleifend, nulla non tempor maximus, augue nibh facilisis magna.
      </p>
    </div>
    <!--.icono-->
  </div>
  <!--.iconos-nosotros-->
</main>

<section class="seccion contenedor">
  <h2>Apartamentos y Casas en Venta</h2>

  <?php

  $limite = 6;

  include 'includes/templates/anuncios.php';
  ?>

  <div class="alinear-derecha">
    <a class="btn-verde" href="./anuncios.php">Ver Todas</a>
  </div>
</section>

<section class="imagen-contacto">
  <h2>Encuentra la Casa de tus Sueños</h2>

  <p>
    Llena el formulario de contacto y un asesor se pondra en contacto contigo a
    la brevedad
  </p>

  <a href="./contacto.php" class="btn-amarillo">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
  <section class="blog">
    <h3>Nuestro Blog</h3>

    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/entrada-4.webp" type="image/webp" />
          <source srcset="build/img/entrada-4.jpg" type="image/jpeg" />
          <img src="build/img/entrada-4.jpg" width="200" height="300" alt="Texto entrada blog" loading="lazy" />
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="./entrada.php">
          <h4>Terraza en el Techo de tu Casa</h4>

          <p class="info-meta">
            Escrito el <span>04/03/2024</span> por: <span>Daniel Soto</span>
          </p>

          <p>
            Consejos para construir una terraza en el techo de tu casa con los
            mejores materiales y ahorrando dinero
          </p>
        </a>
      </div>
    </article>
    <!--.entrada-blog-->

    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/entrada-3.webp" type="image/webp" />
          <source srcset="build/img/entrada-3.jpg" type="image/jpeg" />
          <img src="build/img/entrada-3.jpg" width="200" height="300" alt="Texto entrada blog" loading="lazy" />
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="./entrada.php">
          <h4>Guia para la Decoracion de tu Hogar</h4>

          <p class="info-meta">
            Escrito el <span>07/03/2024</span> por: <span>Daniel Soto</span>
          </p>

          <p>
            Maximiza el espacio en tu hogar con esta guia, aprende a combinar
            muebles y colores para darle vida a tu espacio
          </p>
        </a>
      </div>
    </article>
    <!--.entrada-blog-->
  </section>
  <!--.blog-->

  <section class="testimoniales">
    <h3>Testimoniales</h3>

    <div class="testimonial">
      <blockquote>
        El personal se comporto de una excelente manera, muy buena atencion y la
        casa que me ofrecieron cumple con todas mis expectativas
      </blockquote>

      <p>- Angel Daniel Soto</p>
    </div>
  </section>
</div>

<?php

incluirTemplate('footer');

?>