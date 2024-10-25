<?php

use App\Config\Parameters;

$header = __DIR__ . '/../layouts/header.php';

require_once $header;

?>

<main class="container">
  
  <section class="appointment">
    
    <div class="appointment__image">
      <img
        src="<?=Parameters::BASE_URL . '/resources/images/imagen-agenda-visita.jpg'?>"
        alt="Imagen Agenda su visita en EnergySun">
    </div>

    <form 
      action="<?=Parameters::BASE_URL . '/visitas/visita/agendar' ?>" 
      method="post"
      class="appointment__form form">

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
        <textarea 
          type="text" 
          name="appointment_address" 
          id="appointment-address" class="form__textarea"></textarea>
      </div>

      <button type="submit" class="btn btn-primary form__button" >Agendar visita</button>

    </form>

  </section>

  <?php if( isset($fecha) && isset($hora) && isset($direccion) ): ?>
  <p>La cita quedo para la fecha <?= $fecha ?> </p>
  <p>La cita quedo para la hora <?= $hora ?> </p>
  <p>Iran al lugar:  <?= $direccion ?> </p>
  <?php endif; ?>

</main>

<?php
$footer = __DIR__ . '/../layouts/footer.php';
require_once $footer; ?>