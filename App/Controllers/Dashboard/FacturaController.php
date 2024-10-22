<?php

namespace App\Controllers\Dashboard;

class FacturaController
{
  public function vista() {
    require_once __DIR__ . "/../../../resources/views/dashboard/facturas/vw_facturas.php";
  }
}