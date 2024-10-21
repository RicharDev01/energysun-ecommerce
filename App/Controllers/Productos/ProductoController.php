<?php

namespace App\Controllers\Productos;

class ProductoController {

  public function lista(): void {
    require_once __DIR__ . '/../../../resources/views/productos/vw_lista_productos.php';
  }
  
  public function ver_producto(): void{
    
    if( $_GET['param'] ) {
      $codigo_producto = $_GET['param'];
    } else {
      header('Location: /productos/producto/lista');
      die();
    }

    // echo "Este es el codigo del producto $codigo_producto";
    require_once __DIR__ . '/../../../resources/views/productos/vw_producto.php';
  }



}