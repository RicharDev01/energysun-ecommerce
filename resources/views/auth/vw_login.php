<?php

use App\Config\Parameters;
use App\Helpers\Helpers;


$header = __DIR__ . '/../layouts/header.php';

require_once $header;

?>

<main class="container">

  <?php if (isset( $_SESSION['error_login'] ) ): ?>
    <div class="message-alert alert-error">
      <img src="<?= Parameters::BASE_URL . '/resources/images/icons/icon-error.svg' ?>" class=""
        alt="Icono del delivery" />

      <div class="message-content">
        <h3> <?= $_SESSION['error_login'] ?> </h3>
      </div>

    </div>
  <?php endif; ?>
  <?php Helpers::deleteSession('error_login'); ?>

  <section class="login">

    <div class="login__image">
      <img src="<?= Parameters::BASE_URL . '/resources/images/imagen-login.png' ?>"
        alt="Imagen Agenda su visita en EnergySun">
    </div>

    <form 
      action="<?= Parameters::BASE_URL . '/auth/login/ingresar' ?>" 
      method="post" 
      class="login__form form"
      autocomplete="off">

      <h2>Iniciar sesion</h2>

      <div class="form__group">
        <label for="login_email_username" class="form__label">Usuario: </label>
        <input type="text" name="login_email_username" class="form__input" id="login_email_username">
      </div>

      <div class="form__group">
        <label for="login-password" class="form__label">Contraseña:</label>
        <input type="password" name="login_password" class="form__input" id="login-password">
      </div>

      <button type="submit" class="btn btn-primary form__button">
        Ingresar
      </button>

    </form>

  </section>


</main>

<?php
$footer = __DIR__ . '/../layouts/footer.php';
require_once $footer; ?>