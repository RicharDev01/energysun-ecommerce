<?php 

namespace App\Repositories;

interface IFacturaRepository {

  /**
   * Obtener el total de ordenes registradas en el sistema
   * @return int
   */
  public function total_ordenes(): int;

  /**
   * Obtener el total de dinero recaudado
   * @return float
   */
  public function total_recaudado(): float;

}