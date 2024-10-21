<?php
use App\Config\Parameters;
require_once __DIR__.'/../layouts/header.php';
?>

<main class="container">
  
  <section class="not_found_page">
    <h2 class="not__title" >Oooh No !</h2>
    <p class="not__content" >La página que buscas no se encuentra</p>
    
    <img src="<?=Parameters::BASE_URL.'/resources/images/undraw_page_not_found.svg' ?>" alt="not found page from EnergySun" class="not__image">


    <a href="<?=Parameters::BASE_URL?>" class="btn btn-primary btn-lg">
      Regresar a Inicio
    </a>
  </section>

</main>

<?php
require_once __DIR__.'/../layouts/footer.php';
?>