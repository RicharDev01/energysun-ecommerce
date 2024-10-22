<?php

namespace App\Controllers\Dashboard;

class CategoriaController
{
  public function vista() {
    require_once __DIR__ . "/../../../resources/views/dashboard/categorias/vw_categorias.php";
  }
}