<?php

namespace App\Controllers\Visitas;

use App\Config\Parameters;
use App\DAO\ClienteDao;
use App\DAO\VisitaDao;
use App\Helpers\Helpers;
use App\Models\Cliente;
use App\Models\Usuario;
use App\Models\Visita;

class VisitaController
{

  public function formulario(): void
  {

    require_once __DIR__ . '/../../../resources/views/visitas/vw_agendar_visita.php';

  }

  public function agendar(): void
  {

    // echo '<pre>';
    // var_dump( !Helpers::validarFechaNoAnterior( $_POST['appointment_date'] ) );
    // echo '</pre>';
    // exit();

    if (
      isset($_POST)
      && $_POST['usuario_id']
      && $_POST['appointment_date']
    ) {

      session_start();

      $usuario_id = $_POST['usuario_id'];
      if (empty($usuario_id)) {
        $_SESSION['error_agenda'] = "Campo 'Usuario' es Obligatorio";
        require_once __DIR__ . "/../../../resources/views/visitas/vw_agendar_visita.php";
        return;
      }

      $fecha = $_POST['appointment_date'];
      if (empty($fecha)) {
        $_SESSION['error_agenda'] = "Campo 'Fecha' es Obligatorio";
        require_once __DIR__ . "/../../../resources/views/visitas/vw_agendar_visita.php";
        return;
      }

      if ( !Helpers::validarFechaNoAnterior( $fecha ) ) {
        $_SESSION['error_agenda'] = "La fecha ingresada, no puede ser menor a la actual";
        require_once __DIR__ . "/../../../resources/views/visitas/vw_agendar_visita.php";
        return;
      } 

      $hora = $_POST['appointment_time'] ?? null;
      if (empty($hora)) {
        $_SESSION['error_agenda'] = "Campo 'Hora' es Obligatorio";
        require_once __DIR__ . "/../../../resources/views/visitas/vw_agendar_visita.php";
        return;
      }

      $direccion = $_POST['appointment_address'] ?? null;
      if (empty($direccion)) {
        $_SESSION['error_agenda'] = "Campo 'Direccion' es Obligatorio";
        require_once __DIR__ . "/../../../resources/views/visitas/vw_agendar_visita.php";
        return;
      }

      // validados los datos, construyo mi objeto visita
      $visita = new Visita();
      $clienteDao = new ClienteDao();
      $cliente = $clienteDao->find_by_user_id($usuario_id);

      $visita->setCliente($cliente);
      $visita->setFecha($fecha);
      $visita->setHora($hora);
      $visita->setDireccion($direccion);

      // mando la visita para agregar a base de datos
      $visitaDao = new VisitaDao();
      $res = $visitaDao->save($visita);

      if ($res) {
        $_SESSION['success'] = 'Se ha registrado su visita! | Tu solicitud de cita ha sido registrada y enviada al área administrativa. En breve será asignada a uno de nuestros técnicos especializados, quien se pondrá en contacto contigo para coordinar la evaluación de tu propiedad. ¡Gracias por confiar en EnergySun!';

        require_once __DIR__ . '/../../../resources/views/visitas/vw_agendar_visita.php';
      } else {
        $_SESSION['error_agenda'] = 'No se ha podido registrar su visita';

        require_once __DIR__ . '/../../../resources/views/visitas/vw_agendar_visita.php';
      }

    }

    if ( !headers_sent() ){
      header('Location: ' . Parameters::BASE_URL . '/visitas/visita/formulario');
      exit;
    }


  }

}