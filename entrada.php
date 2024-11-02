<?php

require './includes/app.php';

incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
  <h2>Guia para la Decoracion de tu Hogar</h2>

  <picture>
    <source srcset="build/img/destacada2.webp" type="image/webp" />
    <source srcset="build/img/destacada2.jpg" type="image/jpeg" />
    <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la Propiedad" />
  </picture>

  <div class="resumen-blog">
    <p class="info-meta">
      Escrito el <span>12/03/2024</span> por: <span>Daniel Soto</span>
    </p>

    <p class="first-text">
      Ut dapibus eu lacus ac scelerisque. Donec odio risus, volutpat ut
      vestibulum sed, ultricies sit amet orci. In rhoncus interdum lobortis.
      Quisque auctor euismod diam, ut aliquet dui finibus et. Proin in massa
      enim. Curabitur posuere in mauris vel eleifend. Cras accumsan
      tristique odio, pharetra tempus lorem posuere eu. Nullam dictum, nisl
      a laoreet lacinia, metus massa sagittis ante, sit amet vestibulum
      turpis nisl nec quam. Proin justo est, venenatis nec scelerisque ut,
      elementum eget turpis. Morbi tincidunt mauris tortor, condimentum
      cursus ex hendrerit ut. Maecenas interdum nulla turpis, non iaculis
      orci scelerisque at. Proin sem libero, fringilla id dolor ac, congue
      placerat neque.
    </p>

    <p class="second-text">
      Quisque eu orci ante. Curabitur mollis ut quam quis scelerisque. Ut
      blandit aliquet mi congue convallis. Curabitur et placerat tellus.
      Cras ornare dictum enim, nec aliquam ante pretium tristique. Nunc
      molestie quam vel nunc commodo, vitae hendrerit urna ultricies. Ut
      enim ex, pellentesque vitae rhoncus eu, gravida in libero. Donec et
      condimentum ex. Donec consequat euismod purus vel aliquet.
    </p>
  </div>
</main>

<?php

incluirTemplate('footer');

?>