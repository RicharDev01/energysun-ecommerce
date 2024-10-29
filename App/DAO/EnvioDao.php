<?php 

namespace App\DAO;

use App\Config\Conexion;
use App\Models\Envio;
use App\Repositories\IEnvioRepository;
use PDO;
use PDOException;

class EnvioDao implements IEnvioRepository {

  private PDO $db;

  public function __construct(){
    $con = new Conexion();
    $this->db = $con->getConexion();
  }

/**
   * Firma del metodo para guardar en base de datos.
   * @param mixed $envio el objeto de tipo Envio
   * @return boolean
   */
  public function save( Envio $envio ): bool {
    return false;
  }

  /**
   * Firma del metodo para editar un registro en base de datos
   * @param mixed $envio
   * @return boolean
   */
  public function edit( Envio $envio ): bool {
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
   * @return $envio el objeto encontrado
   */
  public function find_by_id( int $id ): Envio | null {
    return null;
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

  public function total_envios(): int {

    try {
      
      $query = "SELECT COUNT(*) AS TOTAL_ENVIOS FROM ENVIOS WHERE ENV_ESTADO IN ('PENDIENTE', 'EN RUTA')";
      $result = $this->db->query( $query );
      $total_envios = $result->fetchColumn();

      return $total_envios;
      
    } catch (PDOException $e) {
      return 0;
    }

  }

}