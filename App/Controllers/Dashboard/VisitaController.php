<?php

namespace App\Controllers\Dashboard;

class VisitaController
{
  public function vista() {
    require_once __DIR__ . "/../../../resources/views/dashboard/visitas/vw_visitas.php";
  }
}