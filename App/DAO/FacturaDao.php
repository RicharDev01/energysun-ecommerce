<?php

namespace App\DAO;

use App\Config\Conexion;
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

}