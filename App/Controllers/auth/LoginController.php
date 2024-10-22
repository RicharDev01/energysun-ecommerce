<?php


namespace App\Controllers\Auth;

use App\Config\Parameters;
use App\DAO\UsuarioDao;

class LoginController
{

  private UsuarioDao $usuarioDao;
  public $message = '';

  /**
   * @param UsuarioDao $usuarioDao
   */
  public function __construct()
  {
    $this->usuarioDao = new UsuarioDao();
  }


  public function vista(): void
  {

    require_once __DIR__ . '/../../../resources/views/auth/vw_login.php';

  }

  public function ingresar(): void
  {
		
    if ( isset($_POST) 
      &&  $_POST['login_email_username']
      &&  $_POST['login_password']) {
			
			// INICIAMOS LA SESION, PORQUE USARE VARIABLES DE SESION
	    session_start();
			
      // obtenemos el valor que nos enviaron
      $email_username = $_POST['login_email_username'];
      $pasword = $_POST['login_password'];

      // identificar al usuario
      // Consulta a la base de datos
      $identity = $this->usuarioDao->singin($pasword, $email_username);
	    
	    
      switch ($identity) {
				
        case 'El usuario o email no existe':
          //algo 
          $_SESSION['error_login'] = $identity;
          require_once __DIR__ . '/../../../resources/views/auth/vw_login.php';
          break;
					
        case false: // LA PASSWORD NO COINCIDE
          $_SESSION['error_login'] = 'La contraseña es incorrecta';
          require_once __DIR__ . '/../../../resources/views/auth/vw_login.php';
          break;
					
        case is_object($identity):
					// YA QUE TENGOP EL OBJETO COMPLETO, SE LO DOY A UNA VARIABLE DE SESION
          $_SESSION['identity'] = $identity;
					
          if ($identity->getRol()->getNombre() == 'ADMINISTRADOR') {
            $_SESSION['ADMINISTRADOR'] = true;
	          header( "Location: " . Parameters::BASE_URL . "/dashboard/inicio/vista");
						exit;
						
          } elseif( $identity->getRol()->getNombre() == 'CLIENTE' ) {
	          $_SESSION['CLIENTE'] = true;
	          header( "Location: " . Parameters::BASE_URL . "/productos/producto/lista");
						exit;
          }
          break;
        default:
          echo 'No hay opciones';
      }

      // crear una sesion
    }

    
    if (!headers_sent()) {
      header('Location: '. Parameters::BASE_URL . '/auth/login/vista');
			exit;
    } 

  }

  private function validar(string $username): void
  {

  }


  public function cerrar_sesion()
  {
    session_start();
    unset($_SESSION['identity']);


    unset($_SESSION['ADMINISTRADOR']);

    session_destroy();

    header('Location: ' . Parameters::BASE_URL . '/auth/login/vista');
    exit();

  }

}