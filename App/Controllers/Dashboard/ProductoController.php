<?php

namespace App\Controllers\Dashboard;

class ProductoController
{
  public function vista() {
    require_once __DIR__ . "/../../../resources/views/dashboard/productos/vw_productos.php";
  }
}