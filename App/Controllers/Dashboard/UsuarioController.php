<?php

namespace App\Controllers\Dashboard;

use App\DAO\RolDao;
use App\DAO\UsuarioDao;
use App\Models\Usuario;

class UsuarioController
{
  public function vista() {

    $usuarioDao = new UsuarioDao();
    $lista_usuarios = $usuarioDao->find_all();

    require_once __DIR__ . "/../../../resources/views/dashboard/usuarios/vw_usuarios.php";
  }

  public function guardar() {

    if( isset($_POST) && isset( $_POST['username'] ) ) {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $rol_id = $_POST['rol_id'];

      $usuarioDao = new UsuarioDao();

      $usuario = new Usuario();
      $usuario->setUsername( $username );
      $usuario->setEmail( $email );
      $usuario->setClave(   password_hash($password, PASSWORD_BCRYPT, ['cost' => 4] ) ) ;

      $rolDao = new RolDao();
      
      /**
       * @var mixed
       */
      $rol = $rolDao->find_by_id( $rol_id );
      $usuario->setRol( $rol );

      $res = $usuarioDao->save( $usuario );

      if ( $res ) {
        
        $lista_usuarios = $usuarioDao->find_all();
        require_once __DIR__ . "/../../../resources/views/dashboard/usuarios/vw_usuarios.php";

      }

    }

  }

}