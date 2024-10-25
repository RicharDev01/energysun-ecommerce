<?php

namespace App\Controllers\Productos;

use App\DAO\ProductoDao;

class ProductoController {

  private ProductoDao $productoDao;

  public function __construct(){
    $this->productoDao = new ProductoDao();
  }

  public function lista(): void {
    // le mandamos la lista de productos a la vista
    $lista_productos = $this->productoDao->find_all();

    require_once __DIR__ . '/../../../resources/views/productos/vw_lista_productos.php';
  }
  
  public function ver_producto(): void{
    
    if( isset($_GET['param']) && $_GET['param'] !== "" ) {

      $codigo_producto = $_GET['param'];
      $producto = $this->productoDao->find_by_id( $codigo_producto );

    } else {
      header('Location: /productos/producto/lista');
      die();
    }

    // echo "Este es el codigo del producto $codigo_producto";
    require_once __DIR__ . '/../../../resources/views/productos/vw_producto.php';
  }



}