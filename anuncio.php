<?php
require 'includes/funciones.php';
incluirTemplate('header');
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

  <?php
  incluirTemplate('footer');
?>