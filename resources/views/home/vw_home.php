<?php

use App\Config\Parameters;


$header = __DIR__ . '/../layouts/header.php';

require_once $header;

?>

<main class="">

  <!-- HERO DE LA LANDING PAGE -->
  <!-- <img src="./resources/images/blob.svg" alt=""> -->
  <section class="landing-hero">

    <div class="hero__bg">

      <section class="hero container">

        <article class="hero__content">
          <h1 class="hero__title">
            Paneles Solares <span class="text-mark">Diseñados</span> para usted
          </h1>
          <p class="hero__paragrah">
            En <span class="text-mark">EnergySun</span> , estamos comprometidos con brindarte soluciones energéticas
            limpias y eficientes.
          </p>
          <a href="<?= Parameters::BASE_URL . '/servicios/servicio/lista' ?>" class="btn btn-lg btn-primary">Ver
            nuestras
            soluciones</a>
        </article>

        <div class="hero__image-container">
          <img src="<?= Parameters::BASE_URL . '/resources/images/panel_futurista_imagen_portada.png' ?>"
            alt="Imagen paneles solares de EnergySun" class="hero__image">
        </div>

      </section>

    </div>

  </section>

  <!-- ABOUT US SECTION -->
  <section class="landing-aboutus">

    <article class="aboutus__content">
      <div class="container">
        <h2 class="content__title">¿Por qué Nosotros?</h2>
        <p class="content__text">Nos especializamos en la venta de paneles solares de alta calidad y servicios de
          instalación personalizados, adaptados a tus necesidades.</p>
        <p class="content__text">Con nuestros paquetes solares, no solo ahorras en costos de energía, sino que también
          contribuyes a un planeta más verde y sustentable. ¡Transforma la luz del sol en energía para tu hogar o
          negocio
          con EnergySun!</p>
        <a href="<?= Parameters::BASE_URL . '/productos/producto/lista' ?>"
          class="btn btn-danger btn-lg content__button">Ver nuestros paneles</a>
      </div>
    </article>

  </section>

  <!-- SECCION 3 SOBRE LO QUE OFRECE LA EMPRESA -->
  <section class="landing-offert container">

    <h3 class="offert__subtitle">Nuestra solucion</h3>
    <h2 class="offert__title">Lo que le ofrecemos <br> a usted</h2>

    <p class="offert__content">En <span class="text-mark">EnergySun</span>, te ofrecemos soluciones integrales de
      energía solar. Desde kits solares de alta calidad hasta servicios de instalación especializados, nuestro objetivo
      es brindarte la mejor opción para hacer tu hogar o empresa más eficiente y sostenible.</p>

    <img src="<?= Parameters::BASE_URL . '/resources/images/panel_solar-svg-green1.svg' ?>" alt=""
      class="offert__image">

  </section>

  <!-- SECCION DE LOS SERVICIOS -->
  <div class="container">
    <h2 id="servicios">Le ofrecemos los servicios que necesita</h2>

    <section class="services">

      <article class="services__card services__card-1 ">
        <h3 class="services__title">Asesoramiento</h3>
        <span class="services__number">01</span>
        <a href="<?= Parameters::BASE_URL . '/servicios/servicio/ver_servicio/0001' ?>" class="services__footer">
          <h4>Llamenos para asesorarle</h4>
        </a>
      </article>

      <article class="services__card services__card-2">
        <h3 class="services__title">Instalacion</h3>
        <span class="services__number">02</span>
        <a href="<?= Parameters::BASE_URL . '/servicios/servicio/ver_servicio/0002' ?>" class="services__footer">
          <h4>Somos expertos en instalaciones</h4>
        </a>
      </article>

      <article class="services__card services__card-3">
        <h3 class="services__title">Mantenimiento</h3>
        <span class="services__number">03</span>
        <a href="<?= Parameters::BASE_URL . '/servicios/servicio/ver_servicio/0003' ?>" class="services__footer">
          <h4>Nuestro cliente es la priodida</h4>
        </a>
      </article>

    </section>
  </div>

</main>

<?php
$footer = __DIR__ . '/../layouts/footer.php';
require_once $footer; ?>