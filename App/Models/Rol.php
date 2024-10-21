<?php

namespace App\Models;

class Rol
{

  private $codigo;
  private $nombre;
  private $fecha_registro;
  private $fum;
	private $estado;

  public function __construct()
  {

  }

  /**
   * @return mixed
   */
  public function getCodigo()
  {
    return $this->codigo;
  }

  /**
   * @param mixed $codigo
   */
  public function setCodigo($codigo): void
  {
    $this->codigo = $codigo;
  }

  /**
   * @return mixed
   */
  public function getNombre()
  {
    return $this->nombre;
  }

  /**
   * @param mixed $nombre
   */
  public function setNombre($nombre): void
  {
    $this->nombre = $nombre;
  }

  /**
   * @return mixed
   */
  public function getFechaRegistro()
  {
    return $this->fecha_registro;
  }

  /**
   * @param mixed $fecha_registro
   */
  public function setFechaRegistro($fecha_registro): void
  {
    $this->fecha_registro = $fecha_registro;
  }

  /**
   * @return mixed
   */
  public function getFum()
  {
    return $this->fum;
  }

  /**
   * @param mixed $fum
   */
  public function setFum($fum): void
  {
    $this->fum = $fum;
  }
	
	/**
	 * @return mixed
	 */
	public function getEstado()
	{
		return $this->estado;
	}
	
	/**
	 * @param mixed $estado
	 */
	public function setEstado($estado): void
	{
		$this->estado = $estado;
	}

	

}

