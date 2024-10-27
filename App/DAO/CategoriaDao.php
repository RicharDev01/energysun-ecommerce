<?php 

namespace App\DAO;
use App\Config\Conexion;
use App\Models\Categoria;
use App\Repositories\ICategoriaRepository;
use PDO;
use PDOException;

class CategoriaDao implements ICategoriaRepository {

  private PDO $db;

  public function __construct(){
    $con = new Conexion();
    $this->db = $con->getConexion();
  }

    /**
   * Firma del metodo para guardar en base de datos.
   * @param mixed $categoria el objeto de tipo T
   * @return boolean
   */
  public function save( Categoria $categoria ): bool{
    return false;
  }

  /**
   * Firma del metodo para editar un registro en base de datos
   * @param mixed $categoria
   * @return boolean
   */
  public function edit( Categoria $categoria ): bool {
    return false;
  }
  

  /**
   * Firma del metodo para traer la lista completa de una 
   * tabla en base de datos
   * @return array Lista con los registros ncontrados
   */
  public function find_all(): array {

    try {

      $query = "SELECT * FROM CATEGORIAS WHERE CAT_ESTADO = 'ACTIVO' ORDER BY CAT_CODIGO ASC LIMIT 5";

      $ps = $this->db->prepare($query);

      $ps->execute();

      $categorias = $ps->fetchAll(PDO::FETCH_ASSOC);

      $lista_categorias = [];

      foreach ($categorias as $key => $value) {
        $categoria = new Categoria();

        $categoria->setCodigo( $value["CAT_CODIGO"] );
        $categoria->setNombre( $value["CAT_NOMBRE"] );
        $categoria->setDescripcion( $value["CAT_DESCRIPCION"] );
        $categoria->setFecha_registro( $value["CAT_FECHA_REG"] );
        $categoria->setFum( $value["CAT_FUM"] );
        $categoria->setEstado( $value["CAT_ESTADO"] );

        array_push($lista_categorias, $categoria);
       
      }

      return $lista_categorias;

    } catch (\Exception $th) {
      //throw $th;
      return [];
    }

  }

  /**
   * Firma del metodo para traer un registro de la base de datos
   * dado su respectivo ID
   * @param int $id
   * @return $obj el objeto encontrado
   */
  public function find_by_id( int $id ): Categoria {
    
    try {
      
      $query = "SELECT * FROM CATEGORIAS WHERE CAT_CODIGO = :CODIGO";

      $ps = $this->db->prepare($query);

      $ps->bindParam( ":CODIGO", $id );
      $ps->execute();

      $res = $ps->fetch( PDO::FETCH_ASSOC ) ;  

      // creo el objeto de categoria
      $categoria = new Categoria();

      // lo pueblo de data al objeto, con la respuesta recibida
      $categoria->setCodigo( $res["CAT_CODIGO"] );
      $categoria->setNombre( $res["CAT_NOMBRE"] );
      $categoria->setDescripcion( $res["CAT_DESCRIPCION"] );
      $categoria->setFecha_registro( $res["CAT_FECHA_REG"] );
      $categoria->setFum( $res["CAT_FUM"] );

      // retorno el objeto completo
      return $categoria;

    } catch (\Throwable $th) {
      return new Categoria();
    }

  }
  

  /**
   * Firma del metodo para eliminar un registro de la base de datos, 
   * dado su respectivo ID
   * @param int $id
   * @return boolean
   */
  public function delete( int $id ): bool {
    return false;
  }
  
}