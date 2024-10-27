<?php 

namespace App\DAO;

use App\Config\Conexion;
use App\Models\Visita;
use App\Repositories\IVisitaRepository;
use PDO;
use PDOException;

class VisitaDao implements IVisitaRepository {

  private PDO $db;

  public function __construct(){
    $con = new Conexion();
    $this->db = $con->getConexion();
  } 

    /**
   * Firma del metodo para guardar en base de datos.
   * @param mixed $visita el objeto de tipo Visita
   * @return boolean
   */
  public function save( Visita $visita ): bool {

    $cliente_id = $visita->getCliente()->getCodigoCliente();
    $fecha = $visita->getFecha();
    $hora = $visita->getHora();
    $direccion = $visita->getDireccion();

    try {
      // inicio la transaccion
      $this->db->beginTransaction();   
      
      $query = "INSERT INTO VISITAS(VIS_CODIGO_CLIENTE, VIS_CODIGO_USUARIO, VIS_FECHA, VIS_HORA, VIS_DIRECCION) 
                VALUES(:CLIENTE_ID, NULL, :FECHA, :HORA, :DIRECCION)";
      
      $ps = $this->db->prepare($query);

      $ps->bindParam( ':CLIENTE_ID', $cliente_id );
      $ps->bindParam( ':FECHA', $fecha );
      $ps->bindParam( ':HORA', $hora );
      $ps->bindParam( ':DIRECCION', $direccion );

      $rowCount = $ps->execute();

      // damos por aceptado y hacemos el commit
      $this->db->commit();

      return true;

    } catch (PDOException $e) {

      echo '<pre>';
      var_dump( $e->getMessage() );
      echo '</pre>';
      // exit();
      // en caso que falle la transaccion, se hace rollbak
      $this->db->rollBack();

      return false;
    }

  }

  /**
   * Firma del metodo para editar un registro en base de datos
   * @param mixed $visita
   * @return boolean
   */
  public function edit( Visita $visita ): bool {
    return false;
  }

  /**
   * Firma del metodo para traer la lista completa de una 
   * tabla en base de datos
   * @return array Lista con los registros encontrados
   */
  public function find_all(): array {
    return [];
  }

  /**
   * Firma del metodo para traer un registro de la base de datos
   * dado su respectivo ID
   * @param int $id
   * @return $visita el objeto encontrado
   */
  public function find_by_id( int $id ): Visita {
    return new Visita();
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


}