<?php

namespace App\DAO;

use App\Models\Rol;
use PDO;

use App\Config\Conexion;
use App\repositories\IRolRepository;


class RolDao implements IRolRepository
{

  private PDO $db;

  public function __construct()
  {
    $con = new Conexion();
    $this->db = $con->getConexion();
  }

  /**
   * Firma del metodo para guardar en base de datos.
   * @param mixed $rol el objeto de tipo Rol
   * @return boolean
   */
  public function save( Rol $rol ): bool
  {
    return false;
  }

  /**
   * Firma del metodo para editar un registro en base de datos
   * @param mixed $rol
   * @return boolean
   */
  public function edit( Rol $rol ): bool
  {
    return false;
  }

  /**
   * Firma del metodo para traer la lista completa de una 
   * tabla en base de datos
   * @return array Lista con los registros ncontrados
   */
  public function find_all(): array
  {
    return [];
  }

  /**
   * Firma del metodo para traer un registro de la base de datos
   * dado su respectivo ID
   * @param int $id
   * @return $rol el objeto encontrado
   */
  public function find_by_id(int $id): Rol
  {

    $query = "SELECT * FROM roles r WHERE r.ROL_CODIGO = :rolId";

    $ps = $this->db->prepare($query);
    $ps->bindParam(':rolId', $id);
    $ps->execute();
	  $rol_arr = $ps->fetch(PDO::FETCH_ASSOC);
		
		$rol = new Rol();
		$rol->setCodigo($rol_arr['ROL_CODIGO']);
		$rol->setNombre($rol_arr['ROL_NOMBRE']);
		$rol->setFechaRegistro($rol_arr['ROL_FECHA_REGISTRO']);
		$rol->setFum($rol_arr['ROL_FUM']);
		$rol->setEstado($rol_arr['ROL_ESTADO']);

    return $rol;

  }

  /**
   * Firma del metodo para eliminar un registro de la base de datos, 
   * dado su respectivo ID
   * @param int $id
   * @return boolean
   */
  public function delete(int $id): bool
  {
    return false;
  }

}