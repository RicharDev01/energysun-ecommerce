<?php

namespace App\Repositories;

/**
 * Class .
 */
interface ICrud {
  
  /**
   * Firma del metodo para guardar en base de datos.
   * @param mixed $obj el objeto de tipo T
   * @return boolean
   */
  public function save( $obj ): bool;

  /**
   * Firma del metodo para editar un registro en base de datos
   * @param mixed $obj
   * @return boolean
   */
  public function edit( $obj ): bool ;

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
   * @return $obj el objeto encontrado
   */
  public function find_by_id( int $id );

  /**
   * Firma del metodo para eliminar un registro de la base de datos, 
   * dado su respectivo ID
   * @param int $id
   * @return boolean
   */
  public function delete( int $id ): bool;

}
