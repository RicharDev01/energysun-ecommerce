<?php
	
	namespace App\repositories;
	
use App\Models\Cliente;

interface IClienteRepository {
	
	/**
	 * Firma del metodo para guardar en base de datos.
	 * @param mixed $cliente el objeto de tipo Cliente
	 * @return boolean
	 */
	public function save( Cliente $cliente ): bool;
	
	/**
	 * Firma del metodo para editar un registro en base de datos
	 * @param mixed $cliente
	 * @return boolean
	 */
	public function edit( Cliente $cliente ): bool ;
	
	/**
	 * Firma del metodo para traer la lista completa de una
	 * tabla en base de datos
	 * @return array Lista con los registros ncontrados
	 */
	public function find_all(): array;
	
	/**
	 * Firma del metodo para traer un registro de la base de datos
	 * dado su respectivo ID
	 * @param int $id
	 * @return $cliente el objeto encontrado
	 */
	public function find_by_id( int $id ): Cliente;
	
	/**
	 * Firma del metodo para eliminar un registro de la base de datos,
	 * dado su respectivo ID
	 * @param int $id
	 * @return boolean
	 */
	public function delete( int $id ): bool;


	/**
	 * Obtener la cantidad total de los clientes registrados
	 * @return int
	 */
	public function obtener_total_clientes(): int ;


	public function find_by_user_id( int $user_id ): Cliente;
		
}