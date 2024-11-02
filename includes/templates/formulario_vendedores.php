<fieldset>
    <legend>Informacion General</legend>

    <div class="field">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="vendedor[nombre]" placeholder="Nombre del Vendedor" value="<?php echo sani($vendedor->nombre); ?>">
    </div>

    <div class="field">
        <label for="last">Apellido:</label>
        <input type="text" id="last" name="vendedor[apellido]" placeholder="Apellido del Vendedor" value="<?php echo sani($vendedor->apellido); ?>">
    </div>
</fieldset>

<fieldset>
    <legend>Informacion Extra</legend>

    <div class="field">
        <label for="phone">Telefono:</label>
        <input type="tel" id="phone" name="vendedor[telefono]" placeholder="Digite el numero del vendedor" value="<?php echo sani($vendedor->telefono); ?>">
    </div>
</fieldset>