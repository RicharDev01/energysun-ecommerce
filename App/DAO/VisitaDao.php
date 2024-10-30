<?php

namespace App\DAO;

use App\Config\Conexion;
use App\Models\Visita;
use App\Repositories\IVisitaRepository;
use PDO;
use PDOException;

class VisitaDao implements IVisitaRepository
{

  private PDO $db;
  private ClienteDao $clienteDao;
  private UsuarioDao $usuarioDao;

  public function __construct()
  {
    $con = new Conexion();
    $this->db = $con->getConexion();

    $this->clienteDao = new ClienteDao();

    $this->usuarioDao = new UsuarioDao();
  }

  /**
   * Firma del metodo para guardar en base de datos.
   * @param mixed $visita el objeto de tipo Visita
   * @return boolean
   */
  public function save(Visita $visita): bool
  {

    $cliente_id = $visita->getCliente()->getCodigoCliente();
    $fecha = $visita->getFecha();
    $hora = $visita->getHora();
    $direccion = $visita->getDireccion();

    try {
      // inicio la transaccion
      $this->db->beginTransaction();

      $query = "INSERT INTO VISITAS(VIS_CODIGO_CLIENTE, VIS_CODIGO_USUARIO, VIS_FECHA, VIS_HORA, VIS_DIRECCION) 
                VALUES(:CLIENTE_ID, NULL, :FECHA, :HORA, :DIRECCION)";

      $ps = $this->db->prepare($query);

      $ps->bindParam(':CLIENTE_ID', $cliente_id);
      $ps->bindParam(':FECHA', $fecha);
      $ps->bindParam(':HORA', $hora);
      $ps->bindParam(':DIRECCION', $direccion);

      $rowCount = $ps->execute();

      // damos por aceptado y hacemos el commit
      $this->db->commit();

      return true;

    } catch (PDOException $e) {

      echo '<pre>';
      var_dump($e->getMessage());
      echo '</pre>';
      // exit();
      // en caso que falle la transaccion, se hace rollbak
      $this->db->rollBack();

      return false;
    }

  }

  /**
   * Firma del metodo para editar un registro en base de datos
   * @param mixed $visita
   * @return boolean
   */
  public function edit(Visita $visita): bool
  {
    return false;
  }

  /**
   * Firma del metodo para traer la lista completa de una 
   * tabla en base de datos
   * @return array Lista con los registros encontrados
   */
  public function find_all(): array
  {

    try {
      
      $query = "SELECT * FROM VISITAS";

      $result = $this->db->query($query);

      $visitas_arr = $result->fetchAll(PDO::FETCH_ASSOC);

      $lista_visitas = array();

      foreach ($visitas_arr as $visita) {
        
        $visita_obj = new Visita();

        $visita_obj->setCodigo( $visita['VIS_CODIGO'] );
        // Busco al cliente y se lo agrego a la visita
        $cliente = $this->clienteDao->find_by_id( $visita['VIS_CODIGO_CLIENTE'] );
        $visita_obj->setCliente( $cliente );

        // Busco al usuario solo si existe 
        if ( !empty($visita['VIS_CODIGO_USUARIO']) ) {

          $usuario = $this->usuarioDao->find_by_id( $visita['VIS_CODIGO_USUARIO'] );
          $visita_obj->setUsuario( $usuario );

        }

        $visita_obj->setFecha( $visita['VIS_FECHA'] );
        $visita_obj->setHora( $visita['VIS_HORA'] );
        $visita_obj->setDireccion( $visita['VIS_DIRECCION'] );
        $visita_obj->setEstado( $visita['VIS_ESTADO'] );
        $visita_obj->setFecha_reg( $visita['VIS_FECHA_REGISTRO'] );

        array_push( $lista_visitas, $visita_obj );

      }

      return $lista_visitas;

    } catch (PDOException $e) {
      //echo $e;
      return [];
    }

  }

  /**
   * Firma del metodo para traer un registro de la base de datos
   * dado su respectivo ID
   * @param int $id
   * @return $visita el objeto encontrado
   */
  public function find_by_id(int $id): Visita
  {
    return new Visita();
  }

  /**
   * Firma del metodo para eliminar un registro de la base de datos, 
   * dado su respectivo ID
   * @param int $id
   * @return boolean
   */
  public function delete(int $id): bool
  {
    return false;
  }

  public function asignar_visitador(int $visitador_id, int $visita_id): bool
  {

    try {

      $this->db->beginTransaction();

      $query = "UPDATE VISITAS 
        SET VIS_ESTADO = 'EN RUTA', VIS_CODIGO_USUARIO = :VISITADOR_ID 
        WHERE VIS_CODIGO = :CODIGO_VISITA";

      $ps = $this->db->prepare($query);
      $ps->bindParam(':VISITADOR_ID', $visitador_id);
      $ps->bindParam(':CODIGO_VISITA', $visita_id);

      $ps->execute();

      $this->db->commit();

      return true;

    } catch (PDOException $e) {
      $this->db->rollBack();
      return false;
    }

  }


}