<?php

namespace App\Repositories;

use App\Models\Usuario;

interface IUsuarioRepository  {
	
	
	/**
	 * Firma del metodo para guardar en base de datos.
	 * @param mixed $usuario el objeto de tipo Usuario
	 * @return boolean
	 */
	public function save( Usuario $usuario ): bool;
	
	/**
	 * Firma del metodo para editar un registro en base de datos
	 * @param mixed $usuario
	 * @return boolean
	 */
	public function edit( Usuario $usuario ): bool ;
	
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
	 * @return $usuario el objeto encontrado
	 */
	public function find_by_id( int $id ): Usuario;
	
	/**
	 * Firma del metodo para eliminar un registro de la base de datos,
	 * dado su respectivo ID
	 * @param int $id
	 * @return boolean
	 */
	public function delete( int $id ): bool;

  /**
   * Este metodo sirve, para verificar la existencia de un usuario
   * en la base de datos, este metodo, debe usarse antes de guardar
   * o insertar un usuario
   * @param Usuario $usuario
   * @return bool
   */
  public function verify_user_existens( string $username, string $email ): bool;

  /**
   * Metodo que ayuda a consultar a la base de datos si un usuario existe
   * para darle autorizacion de iniciar sesion es decir, un Login
   * @param string $password
   * @param string $email
   * @param string $username
   * @return Usuario
   */
  public function singin(string $password, string $email_username);


}