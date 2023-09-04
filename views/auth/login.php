<main class="container section content-center">
  <h1>Iniciar Sesión</h1>

  <?php foreach ($errores as $error) : ?>

    <div class="alert error">
      <?php echo $error; ?>
    </div>

  <?php endforeach; ?>

  <form class="form" method="POST" action="/login" novalidate>
    <fieldset>
      <legend>Email y Password</legend>

      <label for="email">E-mail</label>
      <input type="text" id="email" name="email" placeholder="Agrega tu email. Ej: correo@ejemplo.com"  />

      <label for="mobile">Password</label>
      <input type="password" id="password" name="password" placeholder="Agrega tu password. Ej: Micontraseña@secreta"  />
    </fieldset>
    <input type="submit" value="Iniciar Sesión" class="btn btn-green">
  </form>
</main>