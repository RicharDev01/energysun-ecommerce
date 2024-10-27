<?php

namespace App\DAO;

use App\Config\Conexion;
use App\Models\Producto;
use App\Repositories\IProductoRepository;
use PDO;

class ProductoDao  implements IProductoRepository {

  private PDO $db;

  public function __construct() {
    $con = new Conexion();
    $this->db = $con->getConexion();
  }

  /**
   * Firma del metodo para guardar en base de datos.
   * @param mixed $producto el objeto de tipo Producto
   * @return boolean
   */
  public function save( $producto ): bool{
    return false;
  }

  /**
   * Firma del metodo para editar un registro en base de datos
   * @param mixed $producto
   * @return boolean
   */
  public function edit( $producto ): bool{
    return false;
  }

  /**
   * Firma del metodo para traer la lista completa de una 
   * tabla en base de datos
   * @return array Lista con los registros encontrados
   */
  public function find_all(): array {
    
    try {
      
      $query = "SELECT * FROM productos";

      $ps = $this->db->prepare($query);
      $ps->execute();

      $productos = array();

      foreach ($ps->fetchAll(PDO::FETCH_ASSOC) as $prod) {
        $objProducto = $this->getProducto($prod);

        // agrego cada uno de los objetos creados 
        $productos[] = $objProducto;
      }

      return $productos;

    } catch (\Throwable $th) {
      return [] ;
    }

  }
  /**
   * Firma del metodo para traer un registro de la base de datos
   * dado su respectivo ID
   * @param int $id
   * @return $producto el objeto encontrado
   */
  public function find_by_id( int $id ): Producto{
    try {
      
      $query = "SELECT * FROM productos WHERE PROD_CODIGO = :CODIGO_PRODUCTO";

      $ps = $this->db->prepare($query);
      $ps->bindParam( ':CODIGO_PRODUCTO', $id );
      $ps->execute();

      $prod = $ps->fetch(PDO::FETCH_ASSOC);

      return $this->getProducto($prod);

    } catch (\Throwable $th) {
      return new Producto() ;
    }
  }

  /**
   * Firma del metodo para eliminar un registro de la base de datos, 
   * dado su respectivo ID
   * @param int $id
   * @return boolean
   */
  public function delete( int $id ): bool{
    return false;
  }

  /**
   * @param mixed $prod
   * @return Producto
   */
  public function getProducto(mixed $prod): Producto
  {
    $objProducto = new Producto();
    $objProducto->setCodigo($prod["PROD_CODIGO"]);
    $objProducto->setNombre($prod["PROD_NOMBRE"]);
    $objProducto->setPrecio($prod["PROD_PRECIO"]);
    $objProducto->setExtract($prod["PROD_EXTRACT"]);
    $objProducto->setDescripcion($prod["PROD_DESCRIPCION"]);
    $objProducto->setImagen_url($prod["PROD_IMAGEN_URL"]);
    $objProducto->setStock($prod["PROD_STOCK"]);
    $objProducto->setDescuento($prod["PROD_DESCUENTO"]);
    $objProducto->setEstado($prod["PROD_ESTADO"]);
    $objProducto->setFecha_reg($prod["PROD_FECHA_REG"]);
    $objProducto->setFum($prod["PROD_FUM"]);

    // CREO LA INSTANCIA CATEGORIA PARA PASARSELA AL OBJ al PRODUCTO
    $cat_dao = new CategoriaDao();
    $categoria = $cat_dao->find_by_id($prod["PROD_CATEGORIA_ID"]);
    // le agrego el objeto recibido a la clase producto
    $objProducto->setCategoria($categoria);

    return $objProducto;
  }

}