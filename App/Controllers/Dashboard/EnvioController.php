<?php

namespace App\Controllers\Dashboard;

use App\DAO\EnvioDao;

class EnvioController
{
  public function vista() {
    require_once __DIR__ . "/../../../resources/views/dashboard/envios/vw_envios.php";
  }

  public function total_envios(): int {

    $envioDao = new EnvioDao();

    return $envioDao->total_envios();

  }

}