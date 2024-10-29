<?php 

namespace App\Repositories;

use App\Models\Envio;

interface IEnvioRepository {

/**
   * Firma del metodo para guardar en base de datos.
   * @param mixed $envio el objeto de tipo Envio
   * @return boolean
   */
  public function save( Envio $envio ): bool;

  /**
   * Firma del metodo para editar un registro en base de datos
   * @param mixed $envio
   * @return boolean
   */
  public function edit( Envio $envio ): bool ;

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
   * @return $envio el objeto encontrado
   */
  public function find_by_id( int $id ): Envio | null;

  /**
   * Firma del metodo para eliminar un registro de la base de datos, 
   * dado su respectivo ID
   * @param int $id
   * @return boolean
   */
  public function delete( int $id ): bool;


  /**
   * 
   * Obtener el total de los envios registrados, 
   * que esten en estado: PENDIENTE; EN RUTA; 
   * @return int
   */
  public function total_envios(): int;

}