<?php

namespace App\Controllers\Dashboard;

use App\Config\Parameters;
use App\DAO\UsuarioDao;
use App\DAO\VisitaDao;

class VisitaController
{
  public function vista() {

    // lista de las visitas
    $visitaDao = new VisitaDao();
    $lista_visitas = $visitaDao->find_all();

    // LISTA DE LOS VISITADORES
    $usuarioDao = new UsuarioDao();
    $lista_visitadores = $usuarioDao->usuarios_visitadores();

    require_once __DIR__ . "/../../../resources/views/dashboard/visitas/vw_visitas.php";
  }

  public function asignar() {

    session_start();

    // $_SESSION['asignado'] = 'Se ha asignado correctamente';

    if ( isset($_POST) 
        && !empty( $_POST["visita-id"] ) 
        && !empty( $_POST["visitador-id"] ) ) {
      
      $visita_id = $_POST["visita-id"];
      $visitador_id = $_POST["visitador-id"];

      $visitaDao = new VisitaDao();
      $isAsignado = $visitaDao->asignar_visitador( $visitador_id, $visita_id );

      if ($isAsignado) {

        $_SESSION['asignado'] = true;

        header("Location: ".Parameters::BASE_URL . "/dashboard/visita/vista");
        exit;
      }
  
    }


  }
 

}