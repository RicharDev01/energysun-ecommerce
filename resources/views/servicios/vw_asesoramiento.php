<?php

use App\Config\Parameters;

$header = __DIR__ . '/../layouts/header.php';

require_once $header;

?>

<main class="container">

  <section class="product">

    <div class="product__image">

      <img src="<?= Parameters::BASE_URL . '/resources/images/services-asesoramiento.jpg' ?>"
        alt="Imagen del producto x">
    </div>

    <article class="product__content product__content--servicio">
      <h2>Asesoramiento Profesional</h2>

      <p class="product__extract">Ofrecemos un asesoramiento especializado y personalizado para la adopción de sistemas
        de energía solar, ayudándote a seleccionar los equipos adecuados y a diseñar el sistema que mejor se adapte a
        tus necesidades energéticas.</p>

      <!-- ESTO ES CONDICIOAL, DEPENDE DEL TIPO DE SERVICIO,
         * SI ES ASESORAMIENTO, DEBERA LLAMAR EL CLIENTE AL EQUIPO.
         * SI ES INSTALACION O MANTENIMIENTO, SE AGENDA UNA CITA. -->
      <section class="product__buy">

        <?php if (isset( $_SESSION['usuario'] ) && $codigo_servicio !== '01'): ?>
          <a href="<?= Parameters::BASE_URL . '/visitas/visita/formulario' ?>"
            class="btn btn-primary btn-lg service__button">Angendar visita</a>

        <?php elseif( $codigo_servicio !== '01' ): ?>
          <div class="message-alert alert-warning">
            <img src="<?= Parameters::BASE_URL . '/resources/images/icons/icon-error.svg' ?>" class=""
              alt="Icono del delivery" />

            <div class="message-content">
              <h3> Para agendar una Visita, debe iniciar sesion </h3>
            </div>

          </div>
        <?php endif; ?>

        <?php if( $codigo_servicio === '01' ): ?>
        
          <a href="tel:+50378757974" class="btn btn-primary btn-lg service__button">Llamenos para asesorarle.</a>
        
        <?php endif; ?>


      </section>

    </article>

  </section>

  <article class="product-description">

    <div class="content">
      <h3>Sobre el servicio</h3>

      <p>
        Nuestro servicio de asesoramiento tiene como objetivo guiarte durante todo el proceso de adopción de energía
        solar, asegurando que obtengas el máximo beneficio de tu inversión.
      </p>

      <p>
        Iniciamos con una evaluación personalizada de tu situación energética, teniendo en cuenta factores como el
        consumo actual, la ubicación de tu propiedad y los objetivos a corto y largo plazo.
      </p>

      <p>
        Posteriormente, te ayudamos a determinar la tecnología más adecuada para tus necesidades, ya sea para el uso
        residencial, comercial o industrial. Además, proporcionamos un análisis detallado de los costos y beneficios,
        ayudándote a comprender el ahorro energético y económico que puedes lograr.
      </p>

      <p>
        Nuestro equipo de expertos está disponible para responder a todas tus preguntas y proporcionarte la información
        técnica necesaria para que tomes decisiones informadas.
      </p>

      <p>
        Con este asesoramiento, garantizamos que puedas seleccionar una solución de energía solar que no solo sea
        eficiente, sino también rentable y sostenible a largo plazo.
      </p>

    </div>

    <div class="publicidad">
      <a href="<?= Parameters::BASE_URL . '/productos/producto/filtro/1' ?>" class="">

        <img src="<?= Parameters::BASE_URL . '/resources/images/banner-lateral.png' ?>" alt="Banner publicitario">
      </a>
    </div>

  </article>

</main>


<?php
$footer = __DIR__ . '/../layouts/footer.php';
require_once $footer; ?>