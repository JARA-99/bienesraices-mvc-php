<main class="container section">
  <h1>Actualizar Propiedad</h1>

  <?php foreach ($errors as $error) : ?>
    <div class="alert error">
      <?php echo $error; ?>
    </div>
  <?php endforeach; ?>

  <a href="/admin" class="btn btn-green">Volver</a>

  <form class="form" method="POST" enctype="multipart/form-data">
    <?php include __DIR__ . '/formulario.php' ?>
    <input type="submit" value="Actualizar Propiedad" class="btn btn-green">
  </form>
</main>