<?php
require 'includes/app.php';
incluirTemplate('header');
?>

  <section class="contenedor seccion">
    <h1>Conoce Sobre Nosotros</h1>

    <div class="contenido-nosotros">
      <div class="imagen">
        <picture>
          <source srcset="build/img/nosotros.webp" type="image/webp">
          <source srcset="build/img/nosotros.jpg" type="image/jpeg">
          <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
        </picture>
      </div>

<div class="texto-nosotros">
  <blockquote>
    25 Anios de experiencia
  </blockquote>
  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium facilis quis, est itaque, ut at, voluptatem repellat iste ratione explicabo cupiditate modi illo eaque. Tempore quibusdam error vel similique Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis perferendis esse tempore, ut ad in voluptatum commodi, ducimus vitae adipisci nesciunt porro quaerat sapiente dicta maxime repudiandae incidunt, labore doloribus.</p>

  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt quas libero facilis nostrum nesciunt sequi officia necessitatibus minus, fugit autem maiores sed nulla esse, dignissimos quae reiciendis. Consectetur, nobis voluptas Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus cumque ipsum optio, labore enim dolor, error minus architecto ad eos reiciendis! Nesciunt molestias consequatur libero earum ab quod quis fugit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam quas illo voluptatum modi porro consectetur officia voluptatem, eaque velit iusto tempore atque commodi est qui odit, blanditiis provident magnam. Ducimus!
  </p>
</div>

    </div>
  </section>

  <main class="contenedor seccion">
    <h1>Mas sobre Nosotros</h1>

    <div class="iconos-nosotros">
      <div class="icono">
        <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
        <h3>Seguridad</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus illum maxime quasi porro quibusdam magni sapiente esse repellendus! Eos nisi iste accusamus pariatur placeat commodi quod minus aut beatae? Molestias!</p>
      
    </div>

    <div class="icono">
      <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
      <h3>Precio</h3>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus illum maxime quasi porro quibusdam magni sapiente esse repellendus! Eos nisi iste accusamus pariatur placeat commodi quod minus aut beatae? Molestias!</p>
    
  </div>

  <div class="icono">
    <img src="build/img/icono3.svg" alt="icono precio" loading="lazy">
    <h3>A Tiempo</h3>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus illum maxime quasi porro quibusdam magni sapiente esse repellendus! Eos nisi iste accusamus pariatur placeat commodi quod minus aut beatae? Molestias!</p>
  
</div>
</div>

</section>


<?php
  incluirTemplate('footer');
?>