<main class="container section">
  <h1>Admin de Bienes Raices</h1>

  <?php
  if ($result) {
    $msg = showNotification(intval($result));

    if ($msg) : ?>
      <p class="alert success">
        <?php echo s($msg); ?>
      </p>
  <?php
    endif;
  } ?>

  <a href="/propiedades/crear" class="btn btn-green">Nueva Propiedad</a>
  <a href="vendedores/crear" class="btn btn-yellow">Nuevo(a) vendedor</a>

  <h2>Propiedades</h2>

  <table class="propiedades">
    <thead>
      <tr>
        <th>Id</th>
        <th>Tìtulo</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <tbody> <!-- Mostrar Resultados --->
      <?php foreach ($propiedades as $propiedad) : ?>
        <tr>
          <td>
            <?php echo $propiedad->id ?>
          </td>
          <td>
            <?php echo $propiedad->titulo ?>
          </td>
          <td><img src="../images/<?php echo $propiedad->imagen ?>" alt="imagen del anuncio" class="table-image rounded"></td>
          <td>€
            <?php echo $propiedad->precio ?>
          </td>
          <td>
            <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="btn-yellow-block">
              Editar
            </a>
            <form method="POST" class="w-100" action="/propiedades/eliminar">
              <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
              <input type="hidden" name="tipo" value="propiedad">
              <input type="submit" class="btn-red-block" value="Eliminar">
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <h2>Vendedores</h2>

  <table class="propiedades">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <tbody> <!-- Mostrar Resultados --->
      <?php foreach ($vendedores as $vendedor) : ?>
        <tr>
          <td>
            <?php echo $vendedor->id; ?>
          </td>
          <td>
            <?php echo $vendedor->nombre . " " . $vendedor->apellido; ?>
          </td>
          <td>
            <?php echo $vendedor->telefono; ?>
          </td>
          <td>
            <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="btn-yellow-block">
              Editar
            </a>
            <form method="POST" class="w-100" action="vendedores/eliminar">
              <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
              <input type="hidden" name="tipo" value="vendedor">
              <input type="submit" class="btn-red-block" value="Eliminar">
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>