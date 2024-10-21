<?php

namespace App\Controllers\Errors;

class ErrorController {

  public function not_found(): void {
    // echo "La Pagina que buscas no existe";
    // echo "Pagina no encontrada (NOT FOUND 404)";
    require_once  __DIR__ . '/../../../resources/views/errors/vw_not_found.php';
  }

  public function server_error(): void {
    // echo "La Pagina que buscas no existe";
    // echo "Pagina no encontrada (NOT FOUND 404)";
    require_once  __DIR__ . '/../../../resources/views/errors/vw_server_error.php';
  }

}