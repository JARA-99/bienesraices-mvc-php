<main class="container section">
  <h1>Nueva Propiedad</h1>

  <?php foreach ($errors as $error) : ?>
    <div class="alert error">
      <?php echo $error; ?>
    </div>
  <?php endforeach; ?>

  <a href="/admin" class="btn btn-green">Volver</a>

  <form class="form" method="POST" enctype="multipart/form-data" action="/propiedades/crear">
    <?php include __DIR__ . '/formulario.php' ?>
    <input type="submit" value="Crear Propiedad" class="btn btn-green">
  </form>
</main>