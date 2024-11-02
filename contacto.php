<?php

require './includes/app.php';

incluirTemplate('header');
?>

<main class="contenido-centrado seccion">
  <h2>Contacto</h2>

  <picture>
    <source srcset="build/img/destacada3.webp" type="image/webp" />
    <source srcset="build/img/destacada3.jpg" type="image/jpeg" />
    <img src="build/img/destacada3.jpg" width="200" height="300" alt="imagen de contacto" loading="lazy" />
  </picture>

  <h2>Llene el formulario de Contacto</h2>

  <form class="formulario">
    <fieldset>
      <legend>Informacion Personal</legend>

      <div class="field">
        <label for="name">Nombre:</label>
        <input type="text" id="name" placeholder="Ingrese su Nombre" />
      </div>

      <div class="field">
        <label for="mail">E-mail:</label>
        <input type="email" id="mail" placeholder="Redacte su Email" />
      </div>

      <div class="field">
        <label for="phone">Telefono:</label>
        <input type="tel" id="phone" placeholder="Escriba su numero" />
      </div>

      <div class="field">
        <label for="message">Mensaje:</label>
        <textarea class="textarea" id="message" placeholder="Redacte su Mensaje"></textarea>
      </div>
    </fieldset>

    <fieldset>
      <legend>Informacion sobre la propiedad</legend>

      <div class="field">
        <label for="opciones">Vende o Compra</label>

        <select id="opciones">
          <option disabled selected>*-- Seleccione --*</option>
          <option value="Compra">Compra</option>
          <option value="Vende">Vende</option>
        </select>
      </div>

      <div class="field">
        <label for="presupuesto">Precio o Presupuesto:</label>
        <input type="number" id="presupuesto" placeholder="Precio o Presupuesto" min="1" />
      </div>
    </fieldset>

    <fieldset>
      <legend>Datos de Contacto</legend>

      <p>Como desea ser contactado</p>

      <div class="forma-contacto">
        <label for="contactar-telefono">Telefono</label>
        <input name="contacto" type="radio" value="telefono" id="contactar-telefono" />

        <label for="contactar-email">E-mail</label>
        <input name="contacto" type="radio" value="email" id="contactar-email" />
      </div>

      <p>Si eligio telefono, elija la fecha y la hora</p>

      <div class="field">
        <label for="fecha">Fecha</label>
        <input type="date" id="fecha" />
      </div>

      <div class="field">
        <label for="hora">Hora</label>
        <input type="time" id="hora" min="09:00" max="18:00" />
      </div>
    </fieldset>

    <div class="alinear-derecha">
      <input class="btn-verde" type="submit" value="Enviar" />
    </div>
  </form>
</main>

<?php

incluirTemplate('footer');

?>