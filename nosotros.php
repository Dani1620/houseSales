<?php

require './includes/app.php';

incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h2>Conoce Sobre Nosotros</h2>

  <div class="nosotros">
    <div class="picture">
      <picture>
        <source srcset="build/img/blog3.webp" type="image/webp" />
        <source srcset="build/img/blog3.jpg" type="image/jpeg" />
        <img src="build/img/blog3.jpg" width="200" height="300" alt="Imagen de nosotros" loading="lazy" />
      </picture>
    </div>

    <div class="informacion-nosotros">
      <blockquote class="expert">20 Años de Experiencia</blockquote>

      <p>
        Ut dapibus eu lacus ac scelerisque. Donec odio risus, volutpat ut
        vestibulum sed, ultricies sit amet orci. In rhoncus interdum
        lobortis. Quisque auctor euismod diam, ut aliquet dui finibus et.
        Proin in massa enim. Curabitur posuere in mauris vel eleifend. Cras
        accumsan tristique odio, pharetra tempus lorem posuere eu. Nullam
        dictum, nisl a laoreet lacinia, metus massa sagittis ante, sit amet
        vestibulum turpis nisl nec quam. Proin justo est, venenatis nec
        scelerisque ut, elementum eget turpis. Morbi tincidunt mauris
        tortor, condimentum cursus ex hendrerit ut. Maecenas interdum nulla
        turpis, non iaculis orci scelerisque at. Proin sem libero, fringilla
        id dolor ac, congue placerat neque.
      </p>

      <p>
        Quisque eu orci ante. Curabitur mollis ut quam quis scelerisque. Ut
        blandit aliquet mi congue convallis. Curabitur et placerat tellus.
        Cras ornare dictum enim, nec aliquam ante pretium tristique. Nunc
        molestie quam vel nunc commodo, vitae hendrerit urna ultricies. Ut
        enim ex, pellentesque vitae rhoncus eu, gravida in libero. Donec et
        condimentum ex. Donec consequat euismod purus vel aliquet.
      </p>
    </div>
    <!--.informacion-nosotros-->
  </div>
  <!--.nosotros-->

  <section class="contenedor seccion">
    <h2>Mas Sobre Nosotros</h2>

    <div class="iconos-nosotros">
      <div class="icono">
        <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy" />

        <h3>Seguridad</h3>

        <p>
          Nunc fermentum pulvinar felis, sit amet facilisis enim imperdiet
          in. Nullam eleifend, nulla non tempor maximus, augue nibh
          facilisis magna.
        </p>
      </div>
      <!--.icono-->

      <div class="icono">
        <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy" />

        <h3>Precio</h3>

        <p>
          Nunc fermentum pulvinar felis, sit amet facilisis enim imperdiet
          in. Nullam eleifend, nulla non tempor maximus, augue nibh
          facilisis magna.
        </p>
      </div>
      <!--.icono-->
      <div class="icono">
        <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy" />

        <h3>A Tiempo</h3>

        <p>
          Nunc fermentum pulvinar felis, sit amet facilisis enim imperdiet
          in. Nullam eleifend, nulla non tempor maximus, augue nibh
          facilisis magna.
        </p>
      </div>
      <!--.icono-->
    </div>
    <!--.icono-nosotros-->
  </section>
</main>

<?php

incluirTemplate('footer');

?>