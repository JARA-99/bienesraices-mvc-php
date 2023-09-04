<main class="container section">
  <h1>Actualizar Vendedor(a)</h1>
  <a href="/bienesraices/admin/index.php" class="btn btn-green">Volver</a>

  <?php foreach ($errores as $error) : ?>
    <div class="alert error">
      <?php echo $error; ?>
    </div>
  <?php endforeach; ?>

  <form class="form" method="POST" >
    <?php include 'formulario.php' ?>
    <input type="submit" value="Guardar Cambios" class="btn btn-green">
  </form>
</main>