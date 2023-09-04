<main class="container section">
  <h1>Registrar Vendedor(a)</h1>
  <a href="/admin" class="btn btn-green">Volver</a>

  <?php foreach ($errores as $error) : ?>
    <div class="alert error">
      <?php echo $error; ?>
    </div>
  <?php endforeach; ?>

  <form class="form" method="POST" action="/vendedores/crear">
    <?php include 'formulario.php'; ?>
    <input type="submit" class="btn btn-green" value="Registrar Vendedor(a)">
  </form>
</main>