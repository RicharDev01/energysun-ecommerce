<?php 

namespace App\Repositories;

use App\Models\Visita;

interface IVisitaRepository {

  /**
   * Firma del metodo para guardar en base de datos.
   * @param mixed $visita el objeto de tipo Visita
   * @return boolean
   */
  public function save( Visita $visita ): bool;

  /**
   * Firma del metodo para editar un registro en base de datos
   * @param mixed $visita
   * @return boolean
   */
  public function edit( Visita $visita ): bool ;

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
   * @return $visita el objeto encontrado
   */
  public function find_by_id( int $id ): Visita;

  /**
   * Firma del metodo para eliminar un registro de la base de datos, 
   * dado su respectivo ID
   * @param int $id
   * @return boolean
   */
  public function delete( int $id ): bool;

  /**
   * Actualiza el estado de la visita y agrega al visitador a la visita
   * @return bool
   */
  public function asignar_visitador( int $visitador_id, int $codigo_visita ): bool;

}