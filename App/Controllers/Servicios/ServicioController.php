<?php

namespace App\Controllers\Servicios;

class ServicioController {

  public function lista(): void {
    require_once  __DIR__ . '/../../../resources/views/servicios/vw_servicios.php';
  }

  public function ver_servicio(): void {

    if( isset( $_GET['param'] ) ) {
      $codigo_servicio = $_GET['param'];

      switch ($codigo_servicio) {

        case '01':
          require_once __DIR__ . '/../../../resources/views/servicios/vw_asesoramiento.php';
          break;

        case '02':
          require_once __DIR__ . '/../../../resources/views/servicios/vw_instalaciones.php';
          break;
          
        case '03':
          require_once __DIR__ . '/../../../resources/views/servicios/vw_mantenimientos.php';
          break;
        
        default:
          require_once __DIR__ . '/../../../resources/views/servicios/vw_servicios.php';
          break;
      }

    } else {
      header('Location: /servicios/servicio/lista');
      die();
    }

    
  
  }

}