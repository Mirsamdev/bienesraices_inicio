<?php
  include './includes/templates/header.php';
?>

  <main class="contenedor seccion contenido-centrado">
    <h1>Casa en Venta Frente al Bosque</h1>

    <picture>
      <source srcset="build/img/destacada.webp" type="image/webp">
      <source srcset="build/img/destacada.jpg" type="image/jpeg">
      <img src="build/img/destacada.jpg" alt="imagen de la propiedad">
    </picture>

    <div class="resumen-propiedad">
      <p class="precio">$3,000,000</p>
      <ul class="iconos-caracteristicas">
        <li>
          <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
          <p>3</p>
        </li>

        <li>
          <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
          <p>3</p>
        </li>

        <li>
          <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
          <p>4</p>
        </li>
      </ul>

      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat atque, rem incidunt recusandae, aspernatur consectetur porro esse distinctio nihil adipisci ex sed autem cupiditate? Quasi qui tenetur nisi ipsum ea. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo porro excepturi tempora adipisci dolor assumenda. Nostrum ea labore, aperiam quia possimus quasi aut, inventore eligendi maiores deleniti, dignissimos officia optio?</p>
    </div>
  </main>

  <footer class="footer seccion">
    <div class="contenedor contenedor-footer">
      <nav class="navegacion">
        <a href="nosotros.html">Nosotros</a>
        <a href="anuncios.html">Anuncios</a>
        <a href="blog.html">Blog</a>
        <a href="contacto.html">Contacto</a>
      </nav>

    </div>

    <p class="copyright">Todos los derechos Reservados 2023 &copy;</p>
  </footer>
  
  <script src="build/js/bundle.min.js"></script>
</body>
</html>