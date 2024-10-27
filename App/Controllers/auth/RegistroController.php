<?php

namespace App\Controllers\auth;

use App\Config\Parameters;
use App\DAO\ClienteDao;
use App\Models\Cliente;
use App\Models\Rol;

class RegistroController
{
  private ClienteDao $clienteDao;

  public function __construct()
  {
    $this->clienteDao = new ClienteDao();
  }

  public function vista()
  {
    require_once __DIR__ . "/../../../resources/views/auth/vw_registro.php";
  }

  public function guardar()
  {
    
    if (isset($_POST)
        && $_POST['register_rol_id']) {
      // inicio sesion, porque se usan variables de sesion
      session_start();

      $rol_id = $_POST['register_rol_id']; //! campo obligatorio
      if (empty($rol_id)) {
        $_SESSION['error_register'] = "Campo rol_id es Obligatorio";
        require_once __DIR__ . "/../../../resources/views/auth/vw_registro.php";
        return;
      }

      $nombre1 = $_POST['register_nombre1'] ?? ''; //! campo obligatorio
      if (empty($nombre1)) {
        $_SESSION['error_register'] = "Campo 'Primer Nombre' es Obligatorio";
        require_once __DIR__ . "/../../../resources/views/auth/vw_registro.php";
        return;
      }

      $nombre2 = $_POST['register_nombre2']; // campo no obligatorio

      $apellido1 = $_POST['register_apellido1'] ?? ''; //! campo obligatorio
      if (empty($apellido1)) {
        $_SESSION['error_register'] = "Campo 'primer apellido' es Obligatorio";
        require_once __DIR__ . "/../../../resources/views/auth/vw_registro.php";
        return;
      }

      $apellido2 = $_POST['register_apellido2']; // campo no obligatorio

      $fecha_nac = $_POST['register_fecha_nac'] ?? ''; //! campo obligatorio
      if (empty($fecha_nac)) {
        $_SESSION['error_register'] = "Campo 'Fecha nacimiento' es Obligatorio";
        require_once __DIR__ . "/../../../resources/views/auth/vw_registro.php";
        return;
      }

      $telefono = $_POST['register_telefono'] ?? ''; //! campo obligatorio
      if (empty($telefono)) {
        $_SESSION['error_register'] = "Campo 'telefono' es Obligatorio";
        require_once __DIR__ . "/../../../resources/views/auth/vw_registro.php";
        return;
      }

      $email = $_POST['register_email'] ?? ''; //! campo obligatorio
      if (empty($email)) {
        $_SESSION['error_register'] = "Campo 'Correo Electronico' es Obligatorio";
        require_once __DIR__ . "/../../../resources/views/auth/vw_registro.php";
        return;
      }

      $username = $_POST['register_username'] ?? ''; //! campo obligatorio
      if (empty($username)) {
        $_SESSION['error_register'] = "Campo 'Usuario' es Obligatorio";
        require_once __DIR__ . "/../../../resources/views/auth/vw_registro.php";
        return;
      }

      $password = $_POST['register_password'] ?? ''; //! campo obligatorio
      if (empty($password)) {
        $_SESSION['error_register'] = "Campo 'Contraseña' es Obligatorio";
        require_once __DIR__ . "/../../../resources/views/auth/vw_registro.php";
        return;
      }

      // YA VALIDADOS LOS DATOS PROCEDO A CREAR UNA INSTANCIA CLIENTE
      $cliente = new Cliente();

      $rol = new Rol();
      $rol->setCodigo($rol_id);

      $cliente->setRol($rol); // recibe objeto de tipo Rol
      $cliente->setPrimerNombre($nombre1);
      $cliente->setSegundoNombre($nombre2);
      $cliente->setPrimerApellido($apellido1);
      $cliente->setSegundoApellido($apellido2);
      $cliente->setFechaNac($fecha_nac);
      $cliente->setTelefono($telefono);
      $cliente->setEmail($email);
      $cliente->setUsername($username);
      $cliente->setClave(password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]));

      // MANDO A GUARDAR AL CLIENTE
      $res = $this->clienteDao->save($cliente);

      // si se logra registrar, mandamos mensaje de exito
      if ($res) {
        $_SESSION['success'] = 'SE HA REGISTRADO CON EXITO';
        require_once __DIR__ . "/../../../resources/views/auth/vw_registro.php";
        return;
      } else {
        $_SESSION['error_register'] = 'No se ha podido registrar, intentelo de nuevo';
        require_once __DIR__ . "/../../../resources/views/auth/vw_registro.php";
        return;
      }

    }


    if (!headers_sent()) {
      header('Location: ' . Parameters::BASE_URL . '/auth/registro/vista');
      exit;
    }

  }


}