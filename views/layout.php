<?php
if (!isset($_SESSION)) {
  session_start();
}

$auth = $_SESSION['login'] ?? false;

if (!isset($init)) {
  $init = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienes Raices</title>
  <link rel="stylesheet" href="../build/css/app.css" />
  <script src="../build/js/bundle.min.js" defer></script>
</head>

<body>
  <header class="header <?php echo $init ? 'init' : ''; ?>">
    <div class="container container-header">
      <div class="navbar">
        <a href="/">
          <img src="/build/img/logo.svg" alt="Logo de Bienes Raices" />
        </a>

        <div class="mobile-menu">
          <img src="/build/img/barras.svg" alt="Icono Menu Responsive" />
        </div>

        <div class="right">
          <img src="/build/img/dark-mode.svg" alt="Modo Oscuro" class="dark-mode-btn" />

          <nav class="navigation">
            <a href="/nosotros">Nosotros</a>
            <a href="/propiedades">Anuncios</a>
            <a href="/blog">Blog</a>
            <a href="/contacto">Contacto</a>
            <?php if($auth) : ?>
              <a href="/logout">Cerrar Sessión</a>
            <?php endif; ?>
          </nav>
        </div>
      </div>
      <!--* Fin de la Barra de Navegación -->
      <?php echo $init ? "<h1>Ventas de Casas y Departamentos Exclusivos de Lujo</h1>" : ""; ?>
    </div>
  </header>

  <?php echo $contenido; ?>

  <footer class="footer section">
    <div class="container container-footer">
      <nav class="navigation">
        <a href="/nosotros">Nosotros</a>
        <a href="/propiedades">Anuncios</a>
        <a href="/blog">Blog</a>
        <a href="/contacto">Contacto</a>
      </nav>
    </div>

    <p class="copyright">Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
  </footer>
</body>

</html>