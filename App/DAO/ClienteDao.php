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
		// TODO: Implement find_by_id() method.
		return new Cliente();
	}

	public function delete(int $id): bool
	{
		// TODO: Implement delete() method.
		return false;
	}

	public function obtener_total_clientes(): int {

		try {
			
			$query = "SELECT COUNT(*) AS TOTAL_CLIENTES FROM VW_DATOS_CLIENTES";
			
			$res = $this->db->query($query);

			return (int) $res->fetch(PDO::FETCH_COLUMN);

		} catch (PDOException $e) {
			return 0;
		}

	}

	public function find_by_user_id(int $user_id): Cliente {
		
		try {
			
			$query = "SELECT * FROM CLIENTES C WHERE C.CLI_USUARIO_ID = :USUARIO_ID";

			$ps = $this->db->prepare($query );
			$ps->bindParam( ':USUARIO_ID', $user_id );
			$ps->execute();

			$cliente_arr = $ps->fetch(PDO::FETCH_ASSOC);

			$cliente = new Cliente();

			$cliente->setCodigoCliente( $cliente_arr['CLI_CODIGO'] );
			$cliente->setCodigo( $cliente_arr['CLI_USUARIO_ID'] ); // codigo de usuario
			$cliente->setFechaNac( $cliente_arr['CLI_FECHA_NAC'] );
			$cliente->setPrimerNombre( $cliente_arr['CLI_PRIMER_NOM'] );
			$cliente->setSegundoNombre( $cliente_arr['CLI_SEGUNDO_NOM'] );
			$cliente->setPrimerApellido( $cliente_arr['CLI_PRIMER_APE'] );
			$cliente->setSegundoNombre( $cliente_arr['CLI_SEGUNDO_APE'] );
			$cliente->setTelefono( $cliente_arr['CLI_TELEFONO'] );
			$cliente->setEstado( $cliente_arr['CLI_ESTADO'] );

			return $cliente;


		} catch (\Throwable $th) {
			//throw $th;
			return new Cliente();
		}

	}

}