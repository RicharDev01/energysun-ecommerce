<?php

namespace App\DAO;

use App\Config\Conexion;
use App\Models\Cliente;
use App\Models\Usuario;
use App\repositories\IClienteRepository;
use PDO;
use PDOException;

class ClienteDao implements IClienteRepository
{

	private PDO $db;

	/**
	 * @param PDO $db
	 */
	public function __construct()
	{
		$con = new Conexion();
		$this->db = $con->getConexion();
	}


	public function save(Cliente $cliente): bool
	{

		$query = "CALL SP_REGISTRO_CLIENTE(:ROL_ID, :USERNAME,:EMAIL,:CLAVE, :FECHA_NAC, :NOMBRE1, :NOMBRE2, :APELLIDO1, :APELLIDO2, :TELEFONO )";

		try {

			// Iniciar transacción
			$this->db->beginTransaction();

			$ps = $this->db->prepare($query);
			$ps->bindValue(':ROL_ID', $cliente->getRol()->getCodigo());
			$ps->bindValue(':USERNAME', $cliente->getUsername());
			$ps->bindValue(':EMAIL', $cliente->getEmail());
			$ps->bindValue(':CLAVE', $cliente->getClave());
			$ps->bindValue(':FECHA_NAC', $cliente->getFechaNac());
			$ps->bindValue(':NOMBRE1', $cliente->getPrimerNombre());
			$ps->bindValue(':NOMBRE2', $cliente->getSegundoNombre());
			$ps->bindValue(':APELLIDO1', $cliente->getPrimerApellido());
			$ps->bindValue(':APELLIDO2', $cliente->getSegundoApellido());
			$ps->bindValue(':TELEFONO', $cliente->getTelefono());

			$ps->execute();

			// Confirmar transacción
			$this->db->commit();

			return true;

		} catch (PDOException $e) {

			// Revertir transacción en caso de error
			$this->db->rollBack();
			return false;

		} finally {
			$ps = null;
		}

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

	public function find_by_id(int $id): Cliente
	{
		try {

			$query = "SELECT *
                FROM CLIENTES C WHERE C.CLI_CODIGO = :CLIENTE_ID";

			$ps = $this->db->prepare($query);
			$ps->bindParam(':CLIENTE_ID', $id);
			$ps->execute();

			$cliente = $ps->fetch(PDO::FETCH_ASSOC);

			return $this->getCliente($cliente);

		} catch (PDOException $e) {
			// echo $e;
			return new Usuario();
		}

	}

	public function delete(int $id): bool
	{
		// TODO: Implement delete() method.
		return false;
	}

	public function obtener_total_clientes(): int
	{

		try {

			$query = "SELECT COUNT(*) AS TOTAL_CLIENTES FROM VW_DATOS_CLIENTES";

			$res = $this->db->query($query);

			return (int) $res->fetch(PDO::FETCH_COLUMN);

		} catch (PDOException $e) {
			return 0;
		}

	}

	public function find_by_user_id(int $user_id): Cliente
	{

		try {

			$query = "SELECT * FROM CLIENTES C WHERE C.CLI_USUARIO_ID = :USUARIO_ID";

			$ps = $this->db->prepare($query);
			$ps->bindParam(':USUARIO_ID', $user_id);
			$ps->execute();

			$cliente_arr = $ps->fetch(PDO::FETCH_ASSOC);

			return $this->getCliente( $cliente_arr );


		} catch (PDOException	$e) {
			//throw $th;
			return new Cliente();
		}

	}

	private function getCliente( $cliente ): Cliente
	{

		$cliente_obj = new Cliente();

		$cliente_obj->setCodigoCliente($cliente['CLI_CODIGO']);
		$cliente_obj->setCodigo($cliente['CLI_USUARIO_ID']); // codigo de usuario
		$cliente_obj->setFechaNac($cliente['CLI_FECHA_NAC']);
		$cliente_obj->setPrimerNombre($cliente['CLI_PRIMER_NOM']);
		$cliente_obj->setSegundoNombre($cliente['CLI_SEGUNDO_NOM']);
		$cliente_obj->setPrimerApellido($cliente['CLI_PRIMER_APE']);
		$cliente_obj->setSegundoApellido($cliente['CLI_SEGUNDO_APE']);
		$cliente_obj->setTelefono($cliente['CLI_TELEFONO']);
		$cliente_obj->setEstado($cliente['CLI_ESTADO']);

		return $cliente_obj;

	}

}