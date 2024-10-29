<?php

namespace App\DAO;

use App\Config\Conexion;
use App\Models\Producto;
use App\Repositories\IProductoRepository;
use PDO;
use PDOException;

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
  public function find_all( string $orden = 'DESC' ): array {
    
    try {

      // Validar que $orden solo tenga los valores permitidos
      $orden = strtoupper($orden) === 'ASC' ? 'ASC' : 'DESC';
      
      $query = "SELECT * FROM productos ORDER BY PROD_PRECIO $orden";

      $ps = $this->db->prepare($query);
      //$ps->bindParam( ":ORDEN", $orden );
      $ps->execute();

      $productos = array();

      foreach ($ps->fetchAll(PDO::FETCH_ASSOC) as $prod) {
        $objProducto = $this->getProducto($prod);

        // agrego cada uno de los objetos creados 
        $productos[] = $objProducto;
      }

      return $productos;

    } catch ( PDOException $e ) {
      echo $e->getMessage();
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

  public function find_by_category(int $categoria_id): array {

    try {

      $query = "SELECT *
                FROM productos P
                INNER JOIN categorias C
                  ON C.CAT_CODIGO = P.PROD_CATEGORIA_ID
                WHERE C.CAT_CODIGO = :CATEGORIA_ID";
    
    $ps = $this->db->prepare($query);
    $ps->bindParam( ':CATEGORIA_ID', $categoria_id );
    $ps->execute();

    $productos_arr = $ps->fetchAll(PDO::FETCH_ASSOC);

    // lista de productos encontrados
    $lista_productos = array();

    foreach( $productos_arr as $prod ){

      $producto = $this->getProducto( $prod );

      array_push( $lista_productos, $producto );

    }
    
    return $lista_productos;

    } catch(PDOException $e) {
      return [];
    }

  }

  public function similar_product( int $categoria_id, int $producto_id ): array{

    try {
      
      $query = "SELECT * FROM productos P WHERE P.PROD_CATEGORIA_ID = :CATEGORIA_ID AND P.PROD_CODIGO <> :PRODUCTO_ID LIMIT 4";

      $ps = $this->db->prepare($query);
      $ps->bindParam( ":CATEGORIA_ID", $categoria_id );
      $ps->bindParam( ":PRODUCTO_ID", $producto_id );
      $ps->execute();

      $productos = array();

      foreach ($ps->fetchAll(PDO::FETCH_ASSOC) as $prod) {
        $objProducto = $this->getProducto($prod);

        // agrego cada uno de los objetos creados 
        $productos[] = $objProducto;
      }

      return $productos;

    } catch ( PDOException $e ) {
      echo $e->getMessage();
      return [] ;
    }

  }

  public function top_sell_products(): array {

    try {
      
      $query = "SELECT P.PROD_NOMBRE, P.PROD_CODIGO, P.PROD_IMAGEN_URL, SUM(DF.DET_CANTIDAD) AS TOTAL_VENDIDO
                FROM PRODUCTOS P
                INNER JOIN DETALLE_FACTURA DF ON DF.DET_CODIGO_PRODUCTO = P.PROD_CODIGO
                GROUP BY P.PROD_CODIGO, P.PROD_NOMBRE, P.PROD_IMAGEN_URL
                ORDER BY TOTAL_VENDIDO DESC
                LIMIT 4";
    
    $result = $this->db->query($query);
    
    $top_sell_products = $result->fetchAll(PDO::FETCH_ASSOC);

    return $top_sell_products;

    } catch (PDOException $e) {
      return [];
    }

  }

}