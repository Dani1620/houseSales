<?php

require './includes/app.php';

incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
  <h2>Nuestro Blog</h2>

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
          Escrito el <span>07/03/2024</span> por: <span>Admin</span>
        </p>

        <p>
          Maximiza el espacio en tu hogar con esta guia, aprende a combinar
          muebles y colores para darle vida a tu espacio
        </p>
      </a>
    </div>
  </article>
  <!--.entrada-blog-->

  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/entrada-2.webp" type="image/webp" />
        <source srcset="build/img/entrada-2.jpg" type="image/jpeg" />
        <img src="build/img/entrada-2.jpg" width="200" height="300" alt="Texto entrada blog" loading="lazy" />
      </picture>
    </div>

    <div class="texto-entrada">
      <a href="./entrada.php">
        <h4>
          Las mejores mejoras para el hogar por un mayor valor de reventa
        </h4>

        <p class="info-meta">
          Escrito el <span>12/03/2024</span> por: <span>Daniel Soto</span>
        </p>

        <p>
          Maximiza el espacio en tu hogar con esta guia, aprende a combinar
          muebles y colores para darle vida a tu espacio
        </p>
      </a>
    </div>
  </article>
  <!--.entrada-blog-->

  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/entrada-1.webp" type="image/webp" />
        <source srcset="build/img/entrada-1.jpg" type="image/jpeg" />
        <img src="build/img/entrada-1.jpg" width="200" height="300" alt="Texto entrada blog" loading="lazy" />
      </picture>
    </div>

    <div class="texto-entrada">
      <a href="./entrada.php">
        <h4>Cómo comprar su primera casa en 7 simples pasos.</h4>

        <p class="info-meta">
          Escrito el <span>17/03/2024</span> por: <span>Admin</span>
        </p>

        <p>
          Maximiza el espacio en tu hogar con esta guia, aprende a combinar
          muebles y colores para darle vida a tu espacio
        </p>
      </a>
    </div>
  </article>
  <!--.entrada-blog-->
</main>

<?php

incluirTemplate('footer');

?>