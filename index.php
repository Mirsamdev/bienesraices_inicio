
<?php
require 'includes/funciones.php';
incluirTemplate('header', $inicio = true);
?>

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

  </main>

  <section class="seccion contenedor">
    <h2>Casas y Depas en venta</h2>

    <div class="contenedor-anuncios">
      <div class="anuncio">
        <picture>
          <source srcset="build/img/anuncio1.jpg" type="image/jpeg"> 
          <source srcset="build/img/anuncio1.webp" type="image/webp"> 
          <img loading="lazy" src="build/img/anuncio1.jpg"
        </picture>

        <div class="contenido-anuncio">
          <h3>Casa de Lujo en en Lago</h3>
          <p>Casa en el lago con exelente vista, acabados de Lujo a un Exelente precio</p>
          <p class="precio">$3,000,00</p>

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

          <a href="anuncios.html" class="boton-amarillo-block">
            Ver Propiedad
          </a>
        </div> <!--.contenido-anuncio-->
      </div> <!--.anuncio-->

      <div class="anuncio">
        <picture>
          <source srcset="build/img/anuncio2.jpg" type="image/jpeg"> 
          <source srcset="build/img/anuncio2.webp" type="image/webp"> 
          <img loading="lazy" src="build/img/anuncio2.jpg"
        </picture>

        <div class="contenido-anuncio">
          <h3>Casa Terminados de Lujo</h3>
          <p>Casa en el lago con exelente vista, acabados de Lujo a un Exelente precio</p>
          <p class="precio">$3,000,00</p>

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

          <a href="anuncios.html" class="boton-amarillo-block">
            Ver Propiedad
          </a>
        </div> <!--.contenido-anuncio-->
      </div> <!--.anuncio-->

      <div class="anuncio">
        <picture>
          <source srcset="build/img/anuncio3.jpg" type="image/jpeg"> 
          <source srcset="build/img/anuncio3.webp" type="image/webp"> 
          <img loading="lazy" src="build/img/anuncio3.jpg"
        </picture>

        <div class="contenido-anuncio">
          <h3>Casa con Alberca</h3>
          <p>Casa en el lago con exelente vista, acabados de Lujo a un Exelente precio</p>
          <p class="precio">$3,000,00</p>

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

          <a href="anuncios.html" class="boton-amarillo-block">
            Ver Propiedad
          </a>
        </div> <!--.contenido-anuncio-->
      </div> <!--.anuncio-->

    </div> <!--.contenedor-anuncios-->

    <div class="alinear-derecha">
      <a href="anuncios.html" class="boton-verde">Ver todas</a>
    </div>
  </section>

<section class="imagen-contacto">
  <h2>Encuentra la casa de tus sueños</h2>
  <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
  <a href="contacto.html" class="boton-amarillo">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
  <section class="blog">
    <h3>Nuestro Blog</h3>

    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog1.webp" type="image/webp">
          <source srcset="build/img/blog1.jpg" type="image/jpeg">
          <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada del Blog">
        </picture>
      </div>
        <div class="texto-entrada">
          <a href="entrada.html">
            <h4>Terraza en el techo de tu Casa</h4>
            <p class="informacion-meta">Escrito el: <span>13/12/2023</span> por: <span>Admin</span></p>
            <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
          </a>
        </div>

      
    </article>

    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog2.webp" type="image/webp">
          <source srcset="build/img/blog2.jpg" type="image/jpeg">
          <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada del Blog">
        </picture>
      </div>
        <div class="texto-entrada">
          <a href="entrada.html">
            <h4>Guia para la decoracion de tu hogar </h4>
            <p class="informacion-meta">Escrito el: <span>13/12/2023</span> por: <span>Admin</span></p>
            <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
          </a>
        

      </div>
    </article>
  </section>

  <section class="testimoniales">
    <h3>Testimonial</h3>
    
    <div class="testimonial">
      <blockquote>
        El personal se comporto de una exelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas.
      </blockquote>
      <p>- Obed Miranda</p>
    </div> 
  </section>
</div>

<?php
  incluirTemplate('footer');
?>