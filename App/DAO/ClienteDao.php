<?php
	
namespace App\DAO;

use App\Config\Conexion;
use App\Models\Cliente;
use App\repositories\IClienteRepository;
use PDO;
use PDOException;

class ClienteDao implements IClienteRepository {
	
	private PDO $db;
	
	/**
	 * @param PDO $db
	 */
	public function __construct()
	{
		$con = new Conexion();
		$this->db = $con->getConexion();
	}
	
	
	public function save( $obj ): bool
	{
		
		$query = "CALL SP_REGISTRO_CLIENTE(:ROL_ID, :USERNAME,:EMAIL,:CLAVE, :FECHA_NAC, :NOMBRE1, :NOMBRE2, :APELLIDO1, :APELLIDO2, :TELEFONO )";
		
		try {
			$ps = $this->db->prepare($query);
			$ps->bindValue(':ROL_ID', $obj->getRolId());
			$ps->bindValue(':USERNAME', $obj->getUsername());
			$ps->bindValue(':EMAIL', $obj->getEmail());
			$ps->bindValue(':CLAVE', $obj->getClave());
			$ps->bindValue(':FECHA_NAC', $obj->getFechaNac());
			$ps->bindValue(':NOMBRE1', $obj->getNombre1());
			$ps->bindValue(':NOMBRE2', $obj->getNombre2());
			$ps->bindValue(':APELLIDO1', $obj->getApellido1());
			$ps->bindValue(':APELLIDO2', $obj->getApellido2());
			$ps->bindValue(':TELEFONO', $obj->getTelefono());
		
		} catch (PDOException $e) {
		
		}
		
		return false;
	}
	
	public function edit($obj): bool
	{
		// TODO: Implement edit() method.
		return false;
	}
	
	public function find_all(): array
	{
		// TODO: Implement find_all() method.
		return [];
	}
	
	public function find_by_id(int $id)
	{
		// TODO: Implement find_by_id() method.
	}
	
	public function delete(int $id): bool
	{
		// TODO: Implement delete() method.
		return false;
	}
}