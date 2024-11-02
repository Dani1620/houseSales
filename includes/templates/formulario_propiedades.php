<fieldset>
    <legend>Informacion General</legend>

    <div class="field">
        <label for="title">Titulo:</label>
        <input type="text" id="title" name="propiedad[titulo]" placeholder="Titulo de la Propiedad" value="<?php echo sani($propiedad->titulo); ?>">
    </div>

    <div class="field">
        <label for="price">Precio:</label>
        <input type="number" id="price" name="propiedad[precio]" placeholder="Precio de la Propiedad" value="<?php echo sani($propiedad->precio); ?>">
    </div>

    <div class="field">
        <label for="image">Imagen:</label>
        <input type="file" id="image" name="propiedad[imagen]" accept="image/jpeg, image/png">

        <?php if ($propiedad->imagen) { ?>
            <img src="../../imagenes/<?php echo $propiedad->imagen; ?>" class="picture-small" alt="Imagen de la propiedad">
        <?php } ?>
    </div>

    <div class="field">
        <label for="description">Descripcion</label>
        <textarea id="description" name="propiedad[descripcion]" class="textarea" placeholder="Redacte una breve descripcion"><?php echo sani($propiedad->descripcion); ?></textarea>
    </div>
</fieldset>

<fieldset>
    <legend>Informacion Propiedad</legend>

    <div class="field">
        <label for="habitaciones">Habitaciones:</label>
        <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 3" min="1" max="9" value="<?php echo sani($propiedad->habitaciones); ?>">
    </div>

    <div class="field">
        <label for="wc">Baños:</label>
        <input type="number" id="wc" name="propiedad[wc]" placeholder="Ej: 1" value="<?php echo sani($propiedad->wc); ?>">
    </div>

    <div class="field">
        <label for="estacionamiento">Estacionamiento:</label>
        <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej: 2" value="<?php echo sani($propiedad->estacionamiento); ?>">
    </div>
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <label for="seller">Vendedor:</label>

    <select name="propiedad[vendedor_id]" id="seller">
        <option value="" selected disabled>*- Elija un vendedor -*</option>

        <?php foreach ($vendedores as $vendedor) { ?>
            <option <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : ''; ?> value="<?php echo sani($vendedor->id); ?>"><?php echo sani($vendedor->nombre) . " " . sani($vendedor->apellido); ?></option>
        <?php } ?>
    </select>

</fieldset>