<?php

use App\Config\Parameters;
?>

<footer class="footer">
  <section class="footer__social">
    <p class="social__title text-white mbottom-2">
      Redes Sociales
    </p>
    <div class="social__icons">
      <a href="https://www.linkedin.com/" target="_blank">
        <img src="<?=Parameters::BASE_URL.'/resources/images/icons/in-icon.svg'?>" alt="linkedin EnergySun">
      </a>
      <a href="https://www.facebook.com/" target="_blank">
        <img src="<?=Parameters::BASE_URL.'/resources/images/icons/facebook-icon.svg'?>" alt="facebook EnergySun">
      </a>
      <a href="https://twitter.com/" target="_blank">
        <img src="<?=Parameters::BASE_URL.'/resources/images/icons/twitter-icon.svg'?>" alt="twitter EnergySun">
      </a>
      <a href="https://www.instagram.com/" target="_blank">
        <img src="<?=Parameters::BASE_URL.'/resources/images/icons/instagram.svg'?>" alt="instagram EnergySun">
      </a>
      <a href="https://www.youtube.com/" target="_blank">
        <img src="<?=Parameters::BASE_URL.'/resources/images/icons/youtube.svg'?>" alt="youtube EnergySun">
      </a>
    </div>
  </section>

  <section class="footer__copy">
    <nav class="footer__menu">
      <a href="<?=Parameters::BASE_URL ?>" class="footer__link">Inicio</a>
      <a href="<?=Parameters::BASE_URL.'/init/nosotros' ?>" class="footer__link">Nosotros</a>
      <a href="<?=Parameters::BASE_URL.'/productos/producto/lista' ?>" class="footer__link">Productos</a>
      <a href="<?=Parameters::BASE_URL.'/servicios/servicio/lista' ?>" class="footer__link">Servicios</a>
      <a href="<?=Parameters::BASE_URL.'/init/contacto' ?>" class="footer__link">Contacto</a>
<!--      <a href="--><?php //=Parameters::BASE_URL.'/init/politicas' ?><!--" class="footer__link footer__link--politicas">Políticas</a>-->
      <a href="<?=Parameters::BASE_URL.'/auth/Encriptador/index' ?>" class="footer__link footer__link--politicas">Encriptar</a>
    </nav>
    <p class="footer__slogan">HACEMOS QUE EL MUNDO BRILLE</p>
    <p class="copy">copyright &copy; <span id="fullyear"></span> EnergySun &reg; - todos los derechos reservados</p>
  </section>

  <section class="footer__contact">

    <a href="mailto:info@energysun.com" target="_blank" class="contact__link">
      <span>info@energysun.com</span>
      <img src="<?=Parameters::BASE_URL.'/resources/images/icons/email-icon.svg'?>" alt="email de EnergySun" class="contact__icon">
    </a>

    <a href="tel:+50325589352" target="_blank" class="contact__link">
      <span>SV 2558-9352</span>
      <img src="<?=Parameters::BASE_URL.'/resources/images/icons/phone-icon.svg'?>" alt="telefono de EnergySun" class="contact__icon">
    </a>

  </section>
</footer>



  <script src="<?=Parameters::BASE_URL.'/resources/js/effects.js' ?>"></script>
  
</body>
</html>