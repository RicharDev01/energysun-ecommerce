<?php

namespace App\Repositories;

use App\Models\Producto;

/**
 * Class .
 */
interface IProductoRepository {
  
  /**
   * Firma del metodo para guardar en base de datos.
   * @param mixed $producto el objeto de tipo Producto
   * @return boolean
   */
  public function save( $producto ): bool;

  /**
   * Firma del metodo para editar un registro en base de datos
   * @param mixed $producto
   * @return boolean
   */
  public function edit( $producto ): bool ;

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
   * @return $producto el objeto encontrado
   */
  public function find_by_id( int $id ): Producto;

  /**
   * Firma del metodo para eliminar un registro de la base de datos, 
   * dado su respectivo ID
   * @param int $id
   * @return boolean
   */
  public function delete( int $id ): bool;

}
