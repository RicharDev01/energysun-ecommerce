<?php 

namespace App\Repositories;

use App\Models\Factura;

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

  public function save( $cliente_id, $fecha_emision ) ;

  public function find_by_id( int $id ): Factura;

  public function guardadr_detalle_factura( $facturaId, $producto_id, $cantidad, $impuesto,$descuento, $total );

  public function reporte_factura(int $codigo_factura );

}