<?php

namespace App\Controllers\Citas;

class CitaController {

  public function formulario():void {

    require_once __DIR__ . '/../../../resources/views/citas/vw_agendar_cita.php';

  }

  public function agendar(): void {
    
    if ( isset( $_POST ) ) {
      $fecha = $_POST['appointment_date'];
      $hora = $_POST['appointment_time'];
      $direccion = $_POST['appointment_address'];
    }

    require_once __DIR__ . '/../../../resources/views/citas/vw_agendar_cita.php';

  }

}