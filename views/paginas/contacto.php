<main class="container section">
  <h1>Contacto</h1>

  <?php if ($msg) :?>
    <p class="alert success"> <?php echo $msg; ?> </p>;
  <?php endif;?>

  <picture>
    <source class="rounded" srcset="build/img/destacada3.webp" type="image/webp" />

    <source class="rounded" srcset="build/img/destacada3.jpg" type="image/jpeg" />

    <img class="rounded" loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto" />

    <h2>Llene el formulario de contacto</h2>

    <form class="form" action="/contacto" method="POST">
      <fieldset>
        <legend>Información Personal</legend>

        <label for="name">Nombre</label>
        <input type="text" id="name" name="contacto[nombre]" placeholder="Agrega tu nombre. Ej: Luis Rodriguez" required/>

        <label for="msg">Mensaje:</label>
        <textarea id="msg" name="contacto[mensaje]" required></textarea>
      </fieldset>

      <fieldset>
        <legend>Información sobre la propiedad</legend>

        <label for="options">Vende o Compra</label>
        <select id="options" name="contacto[tipo]" required>
          <option disabled selected>
            -- Seleccione --
          </option>
          <option value="compra">Compra</option>
          <option value="vende">Vende</option>
        </select>

        <label for="budget">Precio o Presupuesto</label>
        <input type="number" id="budget" placeholder="Agrega el precio o presupuesto. Ej: 2000" name="contacto[precio]" required/>
      </fieldset>

      <fieldset>
        <legend>Contacto</legend>

        <p>Como desea ser contactado?</p>

        <div class="contact-form">
          <label for="contact-phone">Teléfono</label>
          <input  name="contacto[contacto]" type="radio" value="telefono" id="contact-phone" required/>

          <label for="contact-email">E-mail</label>
          <input type="radio" name="contacto[contacto]" value="email" id="contact-email" required/>
        </div>

        <div id="contacto"></div>
      </fieldset>

      <input type="submit" value="Enviar" class="btn-green" />
    </form>
  </picture>
</main>