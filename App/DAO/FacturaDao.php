<?php

namespace App\DAO;

use App\Config\Conexion;
use App\Models\Factura;
use App\Repositories\IFacturaRepository;
use PDO;
use PDOException;

class FacturaDao implements IFacturaRepository
{

  private PDO $db;

  public function __construct()
  {
    $con = new Conexion();
    $this->db = $con->getConexion();
  }


  public function total_ordenes(): int
  {

    try {
      $query = "SELECT COUNT(*) AS TOTAL_ORDENES FROM FACTURAS";
      $result = $this->db->query($query);
      $total_ordenes = $result->fetchColumn();

      return $total_ordenes;

    } catch (PDOException $e) {
      return 0;
    }

  }

  public function total_recaudado(): float {

    try {
      $query = "SELECT SUM(DF.DET_TOTAL) FROM DETALLE_FACTURA DF";

      $result = $this->db->query($query);
      $total_recaudado = $result->fetchColumn();

      return $total_recaudado;

    } catch (PDOException $e) {
      echo $e->getMessage();
      return 0;
    }

  }

  public function save( $cliente_id, $fecha_emision ) {

    try {
      
      $this->db->beginTransaction();

      $query = "INSERT INTO FACTURAS(FAC_CODIGO_CLIENTE, FAC_FECHA_EMISION) 
                VALUES( :CODIGO_CLIENTE, :FECHA_EMISION )";
      
      $ps = $this->db->prepare( $query );
      $ps->bindParam( ':CODIGO_CLIENTE', $cliente_id );
      $ps->bindParam( ':FECHA_EMISION', $fecha_emision );
      $ps->execute();

      $id_nueva_factura = (int) $this->db->lastInsertId();

      $this->db->commit();

      return $id_nueva_factura;

    } catch (PDOException $e) {
      $this->db->rollBack();
      return false;
    }

  }

  public function find_by_id( int $id ): Factura {

    try{
      $query = "SELECT * FROM FACTURAS WHERE FAC_CODIGO = :CODIGO_FACTURA";

      $ps = $this->db->prepare($query);
      $ps->bindParam( ':CODIGO_FACTURA', $id );
      $ps->execute();

      $factura_arr = $ps->fetch( PDO::FETCH_ASSOC );

      $factura_obj = new Factura();
      
      $factura_obj->setCodigo_factura( $factura_arr['FAC_CODIGO'] );
      $factura_obj->setFecha_emision( $factura_arr['FAC_FECHA_EMISION'] );
      $factura_obj->setMetodo_pago( $factura_arr['FAC_METODO_PAGO'] );

      return $factura_obj;

    } catch( PDOException $e ) {
      echo $e;
      return new Factura();
    }

  }

  public function guardadr_detalle_factura($facturaId, $producto_id, $cantidad, $impuesto, $descuento, $total) {

    try {
      
      $this->db->beginTransaction();
      
      $query = "INSERT INTO DETALLE_FACTURA( DET_CODIGO_FACTURA, DET_CODIGO_PRODUCTO, DET_CANTIDAD, DET_IMPUESTO, DET_DESCUENTOS, DET_TOTAL) 
      VALUES( $facturaId, $producto_id, $cantidad, $impuesto, $descuento, $total  )";
      
      $ps = $this->db->prepare( $query );
      $ps->execute();

      $this->db->commit();

      return true;

    } catch ( PDOException $e ) {

      $this->db->rollBack();
      return false;
    }

  }

  public function actualizar_factura( int $codigo, string $metodo_pago ): bool {

    try {
      
      $this->db->beginTransaction();

      $query = "UPDATE FACTURAS SET FAC_METODO_PAGO = :METODO_PAGO WHERE FAC_CODIGO = :CODIGO";
      $ps = $this->db->prepare( $query );
      $ps->bindParam( ":METODO_PAGO", $metodo_pago );
      $ps->bindParam( ":CODIGO", $codigo);
      
      $ps->execute();

      $this->db->commit();

      return true;

    } catch (PDOException $e) {

      return false;
    }

  }

  public function reporte_factura(int $codigoFactura) {
    try {
        // Preparar la consulta SQL
        $query = "SELECT c.CLI_CODIGO,
                          c.CLI_PRIMER_NOM,
                          c.CLI_SEGUNDO_NOM,
                          c.CLI_PRIMER_APE,
                          c.CLI_SEGUNDO_APE,
                          c.CLI_TELEFONO,
                          f.FAC_CODIGO,
                          f.FAC_FECHA_EMISION,
                          f.FAC_METODO_PAGO,
                          d.DET_CODIGO,
                          d.DET_CANTIDAD,
                          d.DET_IMPUESTO,
                          d.DET_DESCUENTOS,
                          d.DET_TOTAL,
                          p.PROD_NOMBRE,
                          p.PROD_PRECIO
                   FROM CLIENTES c
                   INNER JOIN FACTURAS f ON c.CLI_CODIGO = f.FAC_CODIGO_CLIENTE
                   INNER JOIN DETALLE_FACTURA d ON f.FAC_CODIGO = d.DET_CODIGO_FACTURA
                   INNER JOIN PRODUCTOS p ON d.DET_CODIGO_PRODUCTO = p.PROD_CODIGO
                   WHERE f.FAC_CODIGO = :codigoFactura";

        // Preparar la declaración
        $ps = $this->db->prepare($query);
        $ps->bindParam(':codigoFactura', $codigoFactura, PDO::PARAM_INT);

        // Ejecutar la consulta
        $ps->execute();

        // Obtener los resultados
        $result = $ps->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    } catch (PDOException $e) {
        // Manejo de errores
        error_log("Error en reporte_factura: " . $e->getMessage());
        return false;
    }
}


}