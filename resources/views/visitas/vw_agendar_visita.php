<?php

use App\Config\Parameters;
use App\Helpers\Helpers;

$header = __DIR__ . '/../layouts/header.php';

require_once $header;

?>

<main class="container">

  <!-- MENSAJE DE EWRROR DE CREDENCIALES -->
  <?php if (isset($_SESSION['error_agenda'])): ?>
    <div class="message-alert alert-error">
      <img src="<?= Parameters::BASE_URL . '/resources/images/icons/icon-error.svg' ?>" class="" alt="ICONO DE ERROR" />

      <div class="message-content">
        <h3> <?= $_SESSION['error_agenda'] ?> </h3>
      </div>

    </div>
  <?php endif; ?>
  <?php Helpers::deleteSession('error_agenda'); ?>

  <!-- MENSAJE DE EXITO DE REGISTRO -->
  <?php if (isset($_SESSION['success'])): ?>
    <div class="message-alert">
      <img src="<?= Parameters::BASE_URL . '/resources/images/icons/icon-error.svg' ?>" class="" alt="ICONO" />

      <div class="message-content">
        <h3> <?= $_SESSION['success'] ?> </h3>
      </div>

    </div>
  <?php endif; ?>
  <?php Helpers::deleteSession('success'); ?>

  <section class="appointment">

    <div class="appointment__image">
      <img src="<?= Parameters::BASE_URL . '/resources/images/imagen-agenda-visita.jpg' ?>"
        alt="Imagen Agenda su visita en EnergySun">
    </div>

    <form action="<?= Parameters::BASE_URL . '/visitas/visita/agendar' ?>" method="post" class="appointment__form form">

      <h2>Agende una visita tecnica</h2>


      <div class="form__group">
        <label for="appointment-date" class="form__label">Fecha de la visita</label>
        <input type="date" name="appointment_date" class="form__input" id="appointment-date">
      </div>

      <div class="form__group">
        <label for="appointment-time" class="form__label">Hora de la visita</label>
        <input type="time" name="appointment_time" class="form__input" id="appointment-time">
      </div>

      <div class="form__group">
        <label for="appointment-address" class="form__label">Direccion</label>
        <textarea type="text" name="appointment_address" id="appointment-address" class="form__textarea"></textarea>
      </div>

      <!-- CODIGO DEL USUARIO DE SESION -->
      <input type="hidden" name="usuario_id" class="form__input" id="usuario_id"
        value="<?php echo $_SESSION['usuario']->getCodigo(); ?>">

      <button type="submit" class="btn btn-primary form__button">Agendar visita</button>

    </form>

  </section>

  <!-- <?php if (isset($fecha) && isset($hora) && isset($direccion)): ?>
  <p>La cita quedo para la fecha <?= $fecha ?> </p>
  <p>La cita quedo para la hora <?= $hora ?> </p>
  <p>Iran al lugar:  <?= $direccion ?> </p>
  <?php endif; ?> -->

</main>

<?php
$footer = __DIR__ . '/../layouts/footer.php';
require_once $footer; ?>