<?php

namespace App\Controllers\Dashboard;

class EnvioController
{
  public function vista() {
    require_once __DIR__ . "/../../../resources/views/dashboard/envios/vw_envios.php";
  }
}