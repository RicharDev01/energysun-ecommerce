<?php

namespace App\Controllers\Visitas;

class VisitaController {

  public function formulario():void {

    require_once __DIR__ . '/../../../resources/views/visitas/vw_agendar_visita.php';

  }

  public function agendar(): void {
    
    if ( isset( $_POST ) ) {
      $fecha = $_POST['appointment_date'];
      $hora = $_POST['appointment_time'];
      $direccion = $_POST['appointment_address'];
    }

    require_once __DIR__ . '/../../../resources/views/visitas/vw_agendar_visita.php';

  }

}