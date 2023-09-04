<fieldset>
  <legend>Información General</legend>

  <label for="titulo">Titulo:</label>
  <input value="<?php echo s($propiedad->titulo); ?>" type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo Propiedad">

  <label for="precio">Precio:</label>
  <input value="<?php echo s($propiedad->precio); ?>" type="number" id="precio" name="propiedad[precio]" placeholder="Precio Propiedad">

  <label for="imagen">Imagen:</label>
  <input type="file" id="imagen" name="propiedad[imagen]" accept="imagen/jpeg, imagen/png">

  <?php if ($propiedad->imagen) : ?>

    <img src="../../images/<?php echo $propiedad->imagen ?>" alt="Imagen propiedad" class="small-image rounded">

  <?php endif; ?>

  <label for="descripcion">Descripción</label>
  <textarea name="propiedad[descripcion]" id="descripcion" placeholder="Descripción Propiedad"><?php echo s($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
  <legend>Información Propiedad</legend>

  <label for="habitaciones">Habitaciones:</label>
  <input value="<?php echo s($propiedad->habitaciones); ?>" type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 4" min="1" max="9">

  <label for="wc">Baños:</label>
  <input value="<?php echo s($propiedad->wc); ?>" type="number" id="wc" name="propiedad[wc]" placeholder="Ej: 2">

  <label for="estacionamiento">Estacionamiento:</label>
  <input value="<?php echo s($propiedad->estacionamiento); ?>" type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej: 1">
</fieldset>

<fieldset>
  <legend>Vendedor</legend>

  <label for="vendedor">Vendedor</label>
  <select name="propiedad[vendedores_id]" id="vendedor">
    <option value="" selected disabled>- Seleccione un Vendedor -</option>
    <?php foreach ($vendedores as $vendedor) : ?>
      <option <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : ''; ?> value="<?php echo s($vendedor->id); ?>"><?php echo s($vendedor->nombre) . " " . s($vendedor->apellido) ?>
      </option>
    <?php endforeach; ?>
  </select>

</fieldset>