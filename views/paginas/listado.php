<div class="anuncios-container">
  <?php foreach ($propiedades as $propiedad) : ?>
    <div class="anuncio">

      <img class="rounded-top" src="../images/<?php echo $propiedad->imagen; ?>" alt="Anuncio de una casa" />

      <div class="anuncio-content">
        <h3><?php echo $propiedad->titulo; ?></h3>
        <p>
          <?php echo $propiedad->descripcion; ?>
        </p>
        <p class="price">€<?php echo $propiedad->precio; ?></p>
        <ul class="icons-characteristics">
          <li>
            <img class="anuncio-icon" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc" />
            <p><?php echo $propiedad->wc; ?></p>
          </li>
          <li>
            <img class="anuncio-icon" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
            <p><?php echo $propiedad->estacionamiento; ?></p>
          </li>
          <li>
            <img class="anuncio-icon" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" />
            <p><?php echo $propiedad->habitaciones; ?></p>
          </li>
        </ul>
        <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="btn-yellow-block">Ver Propiedad</a>
      </div>
      <!--* .anuncio-content -->
    </div>
    <!-- * .anuncuio -->
  <?php endforeach; ?>
</div>
<!--* .acuncio-container -->