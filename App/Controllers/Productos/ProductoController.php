<?php

namespace App\Controllers\Productos;

use App\DAO\ProductoDao;

class ProductoController {

  private ProductoDao $productoDao;

  public function __construct(){
    $this->productoDao = new ProductoDao();
  }

  public function lista(): void {

    // variable para tener seleccionado el select
    $selected = false;

    if ( isset( $_POST['sortby'] ) ) {

      $sortby = $_POST['sortby'];

      $selected = $sortby !== 'DESC';
      // le mandamos la lista de productos a la vista
      $lista_productos = $this->productoDao->find_all( $sortby );
      
      require_once __DIR__ . '/../../../resources/views/productos/vw_lista_productos.php';
    }

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


  public function filtro(){

    // variable para tener seleccionado el select
    $selected = false;

    if ( isset( $_GET['param'] ) ) {

      $sortby = $_POST['sortby'] ?? null ;

      $selected = $sortby !== 'DESC';

      $categoria_id = $_GET['param'];

      $lista_productos = $this->productoDao->find_by_category( $categoria_id );
    
    }

    require_once __DIR__ . '/../../../resources/views/productos/vw_lista_productos.php';

  }

  public function relacionados( int $categoria_id, int $producto_id ): array{

    // devolve la lista de productos similares
    return $this->productoDao->similar_product( $categoria_id, $producto_id );

  }

}