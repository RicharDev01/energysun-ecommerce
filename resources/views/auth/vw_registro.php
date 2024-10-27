<?php

use App\Config\Parameters;
use App\Helpers\Helpers;


$header = __DIR__ . '/../layouts/header.php';

require_once $header;

?>

<main class="container">

  <!-- MENSAJE DE EWRROR DE CREDENCIALES -->
  <?php if (isset($_SESSION['error_register'])): ?>
    <div class="message-alert alert-error">
      <img src="<?= Parameters::BASE_URL . '/resources/images/icons/icon-error.svg' ?>" class="" alt="ICONO DE ERROR" />

      <div class="message-content">
        <h3> <?= $_SESSION['error_register'] ?> </h3>
      </div>

    </div>
  <?php endif; ?>
  <?php Helpers::deleteSession('error_register'); ?>

  <!-- MENSAJE DE EXITO DE REGISTRO -->
  <?php if (isset($_SESSION['success'])): ?>
    <div class="message-alert">
      <img src="<?= Parameters::BASE_URL . '/resources/images/icons/icon-error.svg' ?>" class="" alt="ICONO DE ERROR" />

      <div class="message-content">
        <h3> <?= $_SESSION['success'] ?> </h3>
      </div>

    </div>
  <?php endif; ?>
  <?php Helpers::deleteSession('success'); ?>

  <!-- FORMULARIO -->
  <section class="register">

    <form action="<?= Parameters::BASE_URL . '/auth/registro/guardar' ?>" method="post" class="register__form"
      autocomplete="on">

      <h2>Registro de Usuarios</h2>


      <section class="register__grid">

        <!-- Datos personales -->
        <div class="register__grid--l">

          <h3>Datos personales</h3>

          <div class="form__group">
            <label for="register_nombre1" class="form__label">Primer Nombre: (*)</label>
            <input type="text" name="register_nombre1" class="form__input" id="register_nombre1">
          </div>

          <div class="form__group">
            <label for="register_nombre2" class="form__label">Segundo Nombre:</label>
            <input type="text" name="register_nombre2" class="form__input" id="register_nombre2">
          </div>

          <div class="form__group">
            <label for="register_apellido1" class="form__label">Primer Apellido: (*)</label>
            <input type="text" name="register_apellido1" class="form__input" id="register_apellido1">
          </div>

          <div class="form__group">
            <label for="register_apellido2" class="form__label">Segundo Apellido:</label>
            <input type="text" name="register_apellido2" class="form__input" id="register_apellido2">
          </div>

          <div class="form__group">
            <label for="register_fecha_nac" class="form__label">Fecha de nacimiento:</label>
            <input type="date" name="register_fecha_nac" class="form__input" id="register_fecha_nac">
          </div>

          <div class="form__group">
            <label for="register_telefono" class="form__label">Telefono:</label>
            <input type="tel" name="register_telefono" class="form__input" id="register_telefono">
          </div>

        </div>

        <!-- Datos de la cuenta -->
        <div class="register__grid--r">

          <h3>Datos de la cuenta</h3>

          <!-- El ID del ROL de cliente (Pordefecto) -->
          <input type="hidden" name="register_rol_id" class="form__input" id="register_rol_id" value="3">

          <div class="form__group">
            <label for="register_email" class="form__label">Correo Electronico (*):</label>
            <input type="email" name="register_email" class="form__input" id="register_email">
          </div>

          <div class="form__group">
            <label for="register_username" class="form__label">Usuario (*):</label>
            <input type="text" name="register_username" class="form__input" id="register_username">
          </div>

          <div class="form__group">
            <label for="register_password" class="form__label">Contraseña (*):</label>
            <input type="password" name="register_password" class="form__input" id="register_password">
          </div>

          <div class="form__group">
            <label for="register_password_repeat" class="form__label">Repetir Contraseña (*):</label>
            <input type="password" name="register_password_repeat" class="form__input" id="register_password_repeat">
          </div>

          <button type="submit" class="btn btn-primary form__button">
            Registrarme
          </button>

        </div>

      </section>


    </form>

  </section>


</main>

<?php
$footer = __DIR__ . '/../layouts/footer.php';
require_once $footer; ?>