<?php

use App\Config\Parameters;

$header = __DIR__ . '/../layouts/header.php';

require_once $header;

?>


<main class="container">

  <section class="product">

    <div class="product__image">

      <img src="<?= Parameters::BASE_URL . '/resources/images/serviciod-residenciales.png' ?>"
        alt="Imagen del producto x">
    </div>

    <article class="product__content">
      <h2>Servicio de instalacion de sus paneles solares : <?= $codigo_servicio ?></h2>
       
       <p class="product__extract">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta eum quisquam iure
        soluta earum? Error asperiores expedita, ut sequi minus iusto quisquam necessitatibus, saepe molestias
        consectetur delectus animi dolorem possimus!</p>

        <!-- ESTO ES CONDICIOAL, DEPENDE DEL TIPO DE SERVICIO,
         * SI ES ASESORAMIENTO, DEBERA LLAMAR EL CLIENTE AL EQUIPO.
         * SI ES INSTALACION O MANTENIMIENTO, SE AGENDA UNA CITA. -->
      <section class="product__buy">
          
          <?php if ( isset( $_SESSION['identity'] ) ) : ?>
            <a href="<?= Parameters::BASE_URL . '/visitas/visita/formulario'?>" class="btn btn-primary btn-lg service__button">Angendar visita</a>
            
          <?php else: ?>
              <div class="message-alert alert-warning">
                  <img src="<?= Parameters::BASE_URL . '/resources/images/icons/icon-error.svg' ?>" class=""
                       alt="Icono del delivery" />
    
                  <div class="message-content">
                      <h3> Para agendar una Visita, debe iniciar sesion </h3>
                  </div>
    
              </div>
          <?php endif; ?>

<!--         <a href="tel:+50378757974" class="btn btn-primary btn-lg service__button">Llamenos para asesorarle.</a> -->

      </section>

    </article>

  </section>

  <article class="product-description">

    <div class="content">
      <h3>Sobre el producto</h3>

      <p>Doloribus accusamus cupiditate nulla odit magni optio repudiandae dolorum temporibus est et, suscipit sit natus
        expedita adipisci nihil molestiae tempore placeat accusantium odio eligendi voluptas quam. Laborum quisquam
        nobis
        natus.</p>
      <p>Eos voluptatum sunt aut consequatur quam, molestiae dignissimos earum eveniet, quae dolore deserunt magnam
        minus
        excepturi ipsam nisi harum temporibus quos accusamus saepe in, totam itaque quidem eius. Eveniet, mollitia.</p>
      <p>Eos voluptatum sunt aut consequatur quam, molestiae dignissimos earum eveniet, quae dolore deserunt magnam
        minus
        excepturi ipsam nisi harum temporibus quos accusamus saepe in, totam itaque quidem eius. Eveniet, mollitia.</p>
      <p>Eos voluptatum sunt aut consequatur quam, molestiae dignissimos earum eveniet, quae dolore deserunt magnam
        minus
        excepturi ipsam nisi harum temporibus quos accusamus saepe in, totam itaque quidem eius. Eveniet, mollitia.</p>
      <p>Eos voluptatum sunt aut consequatur quam, molestiae dignissimos earum eveniet, quae dolore deserunt magnam
        minus
        excepturi ipsam nisi harum temporibus quos accusamus saepe in, totam itaque quidem eius. Eveniet, mollitia.</p>
    </div>

    <div class="publicidad">
      <a href="<?= Parameters::BASE_URL . '/productos/producto/lista' ?>" class="">

        <img src="<?= Parameters::BASE_URL . '/resources/images/banner-lateral.png' ?>" alt="Banner publicitario">
      </a>
    </div>

  </article>

</main>


<?php
$footer = __DIR__ . '/../layouts/footer.php';
require_once $footer; ?>