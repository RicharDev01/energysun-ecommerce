<?php

namespace App\DAO;

use App\Config\Conexion;
use App\Models\Usuario;
use App\Repositories\IUsuarioRepository;
use PDO;
use PDOException;

class UsuarioDao implements IUsuarioRepository
{

  private PDO $db;

  public function __construct()
  {
    $con = new Conexion();
    $this->db = $con->getConexion();
  }

  /**
   * Metodo que se puede usar a la hora de hacer un registro, previamente
   * se puede consultar la existencia del usuario, de esa manera se le indica 
   * al usuario a traves de
   * @param string $username
   * @return bool
   */
  public function verify_user_existens(string $username, string $email): bool
  {

    try {

      // creamos la query
      $query = "SELECT COUNT(*) AS EXISTE 
                FROM usuarios u 
                WHERE u.USU_USERNAME = :username OR u.USU_EMAIL = :email";

      // preparamos y saneamos la query
      $ps = $this->db->prepare($query);
      // le pasamos los parametros
      $ps->bindParam(':username', $username);
      $ps->bindParam(':email', $email);
      // ejecutamos la query limpia
      $verify = $ps->execute();

      // me devuelve un array asociativo con un unico valor (columna) y se llama "hay"
      /// que es un string con un numero, por tanto significa, hay un usuario o hay 0 usuario
      $existe = $ps->fetch(PDO::FETCH_ASSOC)["EXISTE"];

      // verifico, 1) que se haya ejecutado la consulta. 2) parseo a entero y pregunto si es igual a 1 que quiere decir que existe
      return $verify && intval($existe) == 1;


    } catch (PDOException $e) {

      echo "Error al verificar usuario en la linea {$e->getLine()}\n";
      echo "<pre>";
      var_dump($e->getMessage());
      echo "</pre>";
      return false;
    }

  }

  public function singin( string $password, string $email_username )
  {

    // comprobamos si existe el usuario en la db
    $query = "SELECT u.USU_CODIGO AS CODIGO, 
                  u.USU_ROL_ID AS ROL, 
                  u.USU_USERNAME AS USERNAME, 
                  u.USU_EMAIL AS EMAIL,
                  u.USU_CLAVE AS CLAVE,
                  u.USU_ESTADO AS ESTADO,
                  u.USU_FECHA_REGISTRO AS FECHA_REGISTRO,
                  u.USU_FUM AS FUM
              FROM usuarios u 
              WHERE u.USU_USERNAME = :email_username OR u.USU_EMAIL = :email_username ";

    try {

      // preparamos la consulta
      $ps = $this->db->prepare($query);
      // agregamos lo parametros
      $ps->bindParam(':email_username', $email_username);
      // ejecutamos la sentencia ya preparada
      $exist = $ps->execute();

      // si se ejecuto con exito y hay una fila afectada
      // quiere decir que si existe un usuario con ese email o username
      if ($exist && $ps->rowCount() == 1) {

        // obtenemos los datos del usuario de la db
        $data_usuario = $ps->fetch(PDO::FETCH_OBJ);

        // Crear instancia de Usuario
        $usuario = new Usuario();
        $usuario->setCodigo( $data_usuario->CODIGO );
        $usuario->setUsername( $data_usuario->USERNAME );
        $usuario->setEmail( $data_usuario->EMAIL );
        $usuario->setClave( $data_usuario->CLAVE );
				$usuario->setEstado( $data_usuario->ESTADO );
				$usuario->setFecha_registro( $data_usuario->FECHA_REGISTRO );
				$usuario->setFum( $data_usuario->FUM );

        // Crear la instancia de Rol con su nombre
        $rolDao = new RolDao();
	      $rol = $rolDao->find_by_id( $data_usuario->ROL );

        // Asignar Rol al usuario
        $usuario->setRol($rol);
				
        // verificar contraseña
        $verify = password_verify($password, $usuario->getClave());
	      
        if ($verify) 
          // se le devuelve el usuario y sus datos
          return $usuario;
       else 
          return false; // la contraseña no coincide
        

      } else 
        return 'El usuario o email no existe';

    } catch (PDOException $e) {
      //throw $th;
      echo "<pre>";
      var_dump($e->getMessage());
      echo "</pre>";
      return false;
    }
  }

  public function save( Usuario $usuario): bool
  {
    // TODO: Implement save() method.
    return false;
  }

  public function edit( Usuario $usuario): bool
  {
    // TODO: Implement edit() method.
    return false;
  }

  public function find_all(): array
  {
    // TODO: Implement find_all() method.
    return [];
  }

  public function find_by_id(int $id): Usuario
  {
    // TODO: Implement find_by_id() method.
    return new Usuario();
  }

  public function delete(int $id): bool
  {
    // TODO: Implement delete() method.
    return false;
  }
}