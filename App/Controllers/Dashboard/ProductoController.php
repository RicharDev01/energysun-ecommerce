<?php

namespace App\Controllers\Dashboard;

use App\DAO\ProductoDao;

class ProductoController
{
  public function vista() {
    require_once __DIR__ . "/../../../resources/views/dashboard/productos/vw_productos.php";
  }

  public function top_sell_products(): array {

    $productoDao = new ProductoDao();

    // devuelvo la lista de los productos mas vendidos
    return $productoDao->top_sell_products();

  }

}