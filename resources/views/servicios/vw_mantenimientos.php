<?php

use App\Config\Parameters;

$header = __DIR__ . '/../layouts/header.php';

require_once $header;

?>


<main class="container">

  <section class="product">

    <div class="product__image">

      <img src="<?= Parameters::BASE_URL . '/resources/images/services-mantenimiento.jpg' ?>"
        alt="Imagen del producto x">
    </div>

    <article class="product__content product__content--servicio">
      <h2>Siempre contigo</h2>

      <p class="product__extract">Proporcionamos servicios de mantenimiento preventivo y correctivo para asegurar el
        máximo rendimiento y la durabilidad de tu sistema solar, garantizando su funcionamiento continuo y eficiente a
        lo largo del tiempo.</p>

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
      <h3>Sobre el servicio</h3>

      <p>
        El mantenimiento de los sistemas solares es fundamental para garantizar un rendimiento óptimo y prolongar la
        vida útil de la instalación.
      </p>

      <p>
        Nuestro servicio de mantenimiento se divide en dos categorías: preventivo y correctivo.
      </p>

      <p>
        El mantenimiento preventivo incluye la limpieza periódica de los paneles solares para asegurar que la suciedad,
        el polvo o cualquier tipo de residuo no afecten la captación de energía solar.
      </p>

      <p>
        También realizamos revisiones detalladas de todos los componentes, incluyendo el inversor, las conexiones
        eléctricas y el estado de las estructuras de soporte, identificando y previniendo posibles problemas antes de
        que ocurran.
      </p>

      <p>
        En el caso del mantenimiento correctivo, nuestro equipo está preparado para responder rápidamente ante cualquier
        falla, realizando las reparaciones necesarias para que el sistema vuelva a estar operativo en el menor tiempo
        posible.
      </p>

      <p>
        Además, ofrecemos la opción de monitoreo remoto, para detectar de manera temprana cualquier anomalía en el
        rendimiento del sistema y actuar de forma proactiva.
      </p>

      <p>
        Con este enfoque integral de mantenimiento, te aseguramos un funcionamiento eficiente y sin interrupciones,
        maximizando tanto el ahorro energético como la vida útil de la instalación.
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