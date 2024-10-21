<?php

namespace App\repositories;


use App\Models\Rol;

interface IRolRepository {
	
	/**
	 * Firma del metodo para guardar en base de datos.
	 * @param mixed $rol el objeto de tipo Rol
	 * @return boolean
	 */
	public function save(Rol $rol ): bool;
	
	/**
	 * Firma del metodo para editar un registro en base de datos
	 * @param mixed $rol
	 * @return boolean
	 */
	public function edit( Rol $rol ): bool ;
	
	/**
	 * Firma del metodo para traer la lista completa de una
	 * tabla en base de datos
	 * @return array Lista con los registros encontrados
	 */
	public function find_all(): array;
	
	/**
	 * Firma del metodo para traer un registro de la base de datos
	 * dado su respectivo ID
	 * @param int $id
	 * @return $rol el objeto encontrado
	 */
	public function find_by_id( int $id ): Rol;
	
	/**
	 * Firma del metodo para eliminar un registro de la base de datos,
	 * dado su respectivo ID
	 * @param int $id
	 * @return boolean
	 */
	public function delete( int $id ): bool;

}