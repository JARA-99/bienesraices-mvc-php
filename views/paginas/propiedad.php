<main class="container section content-center">
  <h1>
    <?php echo $propiedad->titulo; ?>
  </h1>

  <img class="rounded-top" loading="lazy" src="../images/<?php echo $propiedad->imagen; ?>" alt="Casa Destacada" />

  <div class="summary-property">
    <p class="price">€
      <?php echo $propiedad->precio; ?>
    </p>

    <ul class="icons-characteristics">
      <li>
        <img class="anuncio-icon" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc" />
        <p>
          <?php echo $propiedad->wc; ?>
        </p>
      </li>
      <li>
        <img class="anuncio-icon" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
        <p>
          <?php echo $propiedad->estacionamiento; ?>
        </p>
      </li>
      <li>
        <img class="anuncio-icon" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" />
        <p>
          <?php echo $propiedad->habitaciones; ?>
        </p>
      </li>
    </ul>

    <p>
      <?php echo $propiedad->descripcion; ?>
    </p>
  </div>
</main>