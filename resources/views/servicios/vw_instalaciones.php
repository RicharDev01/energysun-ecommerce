<?php

use App\Config\Parameters;

$header = __DIR__ . '/../layouts/header.php';

require_once $header;

?>


<main class="container">

  <section class="product">

    <div class="product__image">

      <img src="<?= Parameters::BASE_URL . '/resources/images/service-hero-image.jpg' ?>"
        alt="Imagen del producto x">
    </div>

    <article class="product__content product__content--servicio">
      <h2>Servicio de instalacion</h2>

      <p class="product__extract">Realizamos la instalación profesional de sistemas de energía solar, asegurando un
        proceso seguro, eficiente y adaptado a las características específicas de cada hogar o negocio.</p>

      <!-- ESTO ES CONDICIOAL, DEPENDE DEL TIPO DE SERVICIO,
         * SI ES ASESORAMIENTO, DEBERA LLAMAR EL CLIENTE AL EQUIPO.
         * SI ES INSTALACION O MANTENIMIENTO, SE AGENDA UNA CITA. -->
      <section class="product__buy">

        <?php if (isset($_SESSION['usuario'])): ?>
          <a href="<?= Parameters::BASE_URL . '/visitas/visita/formulario' ?>"
            class="btn btn-primary btn-lg service__button">Angendar visita</a>

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

      <p>
        Nuestro servicio de instalación se encarga de todas las etapas necesarias para que el sistema solar esté
        completamente operativo en tu propiedad.
      </p>

      <p>
        Antes de comenzar la instalación, llevamos a cabo un levantamiento físico del lugar para asegurar que la
        instalación se realice en las mejores condiciones posibles y maximice la exposición solar de los paneles.
      </p>

      <p>
        Esto incluye la evaluación de la estructura del techo o del terreno, la orientación, y otros factores que puedan
        afectar el rendimiento.
      </p>

      <p>
        Posteriormente, nuestro equipo de técnicos expertos se encarga de montar los soportes, fijar los paneles, y
        conectar el sistema al inversor y a la red eléctrica de la propiedad.
      </p>

      <p>
        Todo el proceso se lleva a cabo cumpliendo con estrictos estándares de calidad y seguridad, asegurando que tu
        instalación sea confiable y duradera.
      </p>

      <p>
        Además, probamos todo el sistema para verificar que esté funcionando de manera óptima antes de la entrega.
      </p>

      <p>
        Con este enfoque, garantizamos que comiences a generar tu propia energía de manera eficiente desde el primer
        día, reduciendo tu dependencia de la red eléctrica convencional.
      </p>

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