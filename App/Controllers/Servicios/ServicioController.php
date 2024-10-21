<?php

namespace App\Controllers\Servicios;

class ServicioController {

  public function lista(): void {
    require_once  __DIR__ . '/../../../resources/views/servicios/vw_servicios.php';
  }

  public function ver_servicio(): void {

    if( $_GET['param'] ) {
      $codigo_servicio = $_GET['param'];
    } else {
      header('Location: /servicios/servicio/lista');
      die();
    }

    require_once __DIR__ . '/../../../resources/views/servicios/vw_servicio_page.php';
  
  }

}