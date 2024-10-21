<?php

use App\Config\Parameters;

$header = __DIR__ . '/../layouts/header.php';

require_once $header;

?>

<section class="service__hero">

  <div class="container">
    <h1 class="service__title">Nuestros servicio</h1>
    <p class="service__subtitle">Estamos aca para asesorarle y ayudarle en sus intalaciones de paneles solares</p>
    <a href="#servicios" class="btn btn-primary btn-lg">Ver los servicio</a>
  </div>

</section>

<main class="container">

  <h2 id="servicios">Le ofrecemos los servicios que necesita</h2>

  <section class="services">
    
    <article class="services__card services__card-1 ">
      <h3 class="services__title" >Asesoramiento</h3>
      <span class="services__number">01</span>
      <a href="<?=Parameters::BASE_URL.'/servicios/servicio/ver_servicio/0001'?>" class="services__footer">
        <h4>Llamenos para asesorarle</h4>
      </a>
    </article>
    
    <article class="services__card services__card-2">
      <h3 class="services__title" >Instalacion</h3>
      <span class="services__number">02</span>
      <a href="<?=Parameters::BASE_URL.'/servicios/servicio/ver_servicio/0002'?>" class="services__footer">
        <h4>Somos expertos en instalaciones</h4>
      </a>
    </article>

    <article class="services__card services__card-3">
      <h3 class="services__title" >Mantenimiento</h3>
      <span class="services__number">03</span>
      <a href="<?=Parameters::BASE_URL.'/servicios/servicio/ver_servicio/0003'?>" class="services__footer">
        <h4>Nuestro cliente es la prioridad</h4>
      </a>
    </article>

  </section>

</main>

<?php
$footer = __DIR__ . '/../layouts/footer.php';
require_once $footer; ?>