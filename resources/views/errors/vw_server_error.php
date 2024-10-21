<?php
use App\Config\Parameters;
require_once __DIR__.'/../layouts/header.php';
?>

<main class="container">
  
  <section class="server_error_page">
    <h2 class="server__title" >Error del servidor!</h2>

    <img 
      src="<?=Parameters::BASE_URL.'/resources/images/undraw_server_down.svg' ?>" 
      alt="Server Error Page EnergySun" class="server__image">

    <p class="server__content" >Estamos tendiendo inconvenientes en el sistema, por lo que no esta disponible este recurso en estos momento..</p>

    <a href="<?=Parameters::BASE_URL?>" class="btn btn-primary btn-lg">
      Regresar a Inicio Seguro
    </a>
  </section>

</main>

<?php
require_once __DIR__.'/../layouts/footer.php';
?>