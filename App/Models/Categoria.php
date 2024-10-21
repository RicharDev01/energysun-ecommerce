<?php

namespace App\Models;

use DateTime;

class Categoria {
	
	private $codigo;
	private $nombre;
	private $descripcion;
	private $fecha_registro;
	private $fum;
	private $estado;

  public function __construct(){

  }
  

  /**
   * Get the value of codigo
   */ 
  public function getCodigo()
  {
    return $this->codigo;
  }

	/**
	 * Set the value of codigo
	 *
	 * @param   mixed  $codigo  
	 *
	 */
	public function setCodigo($codigo)
	{
		$this->codigo = $codigo;
	}

  /**
   * Get the value of nombre
   */ 
  public function getNombre()
  {
    return $this->nombre;
  }

	/**
	 * Set the value of nombre
	 *
	 * @param   mixed  $nombre  
	 *
	 */
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

  /**
   * Get the value of descripcion
   */ 
  public function getDescripcion()
  {
    return $this->descripcion;
  }

	/**
	 * Set the value of descripcion
	 *
	 * @param   mixed  $descripcion  
	 *
	 */
	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

  /**
   * Get the value of fecha_registro
   */ 
  public function getFecha_registro()
  {
    return $this->fecha_registro;
  }

	/**
	 * Set the value of fecha_registro
	 *
	 * @param   mixed  $fecha_registro  
	 *
	 */
	public function setFecha_registro($fecha_registro)
	{
		$this->fecha_registro = $fecha_registro;
	}


	/**
	 * Get the value of fum
	 *
	 * @return  mixed
	 */
	public function getFum()
	{
		return $this->fum;
	}

	/**
	 * Set the value of fum
	 *
	 * @param   mixed  $fum  
	 *
	 */
	public function setFum($fum)
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