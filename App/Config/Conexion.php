<?php
namespace App\Config;

use PDO;
use PDOException;

class Conexion {
  
  private $db;
  
  public function __construct() {
    $this->connect();
  }
  
  private function connect(): void {
    
    $dbname = 'ENERGYSUN_ECOMMERCE';
    $user = 'root';
		 $password = 'database';
    // $password = '';

    try {
      
      $this->db = new PDO("mysql:host=localhost:3306;dbname=$dbname", $user, $password);
      // Configurar el modo de error para excepciones
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // Deshabilitar autocommit
      $this->db->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

      //echo 'conexion campeon';

    } catch (PDOException $exc) {
      
      echo '<h1> Error de conexion compa: ' . $exc->getMessage() . '</h1>';
      echo '<h2> En la linea: ' .$exc->getLine() . '</h2>';
      echo '<pre>';
      var_dump( $exc->getTrace() );
      echo '</pre>';
      
    }

  }
  
  public function getConexion(): PDO{
    return $this->db;
  }
  
}

