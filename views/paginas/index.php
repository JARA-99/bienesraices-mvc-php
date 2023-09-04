<main class="container section">
  <h1>Más Sobre Nosotros</h1>
  <?php include('iconos.php') ?>
</main>

<section class="section container">
  <h2>Casas y Pisos en Venta</h2>

  <?php
  include 'listado.php';
  ?>

  <div class="to-right">
    <a href="anuncios.php" class="btn-green">Ver Todas</a>
  </div>
</section>

<section class="contact-image">
  <h2>Ecuentra la casa de tu sueños</h2>
  <p>
    Llena el formulario de contacto y un asesor se pondrá en contacto
    contigo en la menor brevedad posible
  </p>
  <a href="contacto.php" class="btn-yellow">Contactanos</a>
</section>

<div class="container section bottom-section">
  <section class="blog">
    <h3>Nuestro Blog</h3>
    <article class="input-blog">
      <div class="image">
        <picture>
          <source srcset="build/img/blog1.webp" type="image/webp" />

          <source srcset="build/img/blog1.jpg" type="image/jpeg" />

          <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog" />
        </picture>
      </div>

      <div class="input-text">
        <a href="entrada.php">
          <h4>Terraza en el techo de tu casa</h4>
          <p class="meta-information">
            Escrito el: <span> 20/10/2023</span> por: <span> Admin</span>
          </p>
          <p>
            Consejos para construir una terraza en el techo de tu casa con
            los mejores materiales y ahorrando dinero
          </p>
        </a>
      </div>
    </article>
    <article class="input-blog">
      <div class="image">
        <picture>
          <source srcset="build/img/blog2.webp" type="image/webp" />

          <source srcset="build/img/blog2.jpg" type="image/jpeg" />

          <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog" />
        </picture>
      </div>

      <div class="input-text">
        <a href="entrada.php">
          <h4>Guía para la decoración de tu hogar</h4>
          <p class="meta-information">
            Escrito el: <span> 20/10/2023</span> por: <span> Admin</span>
          </p>
          <p>
            Maximiza el espacio en tu hogar con esta guía, aprende a
            combinar muebles y colores para darle vida a tu espacio.
          </p>
        </a>
      </div>
    </article>
  </section>

  <section class="testimonials">
    <h3>Testimonios</h3>
    <div class="testimonial">
      <blockquote>
        El personal se comporto de excelente forma, muy buena atención y la
        casa que me ofrecierón cumple con todas mis expectativas.
      </blockquote>
      <p>- Juan Rosales</p>
    </div>
  </section>
</div>