<?php

namespace App\Models;

use App\Models\Rol;

class Usuario {

  private $codigo;
  private Rol $rol ; // clase Rol, debe ser un objeto.
  private $username;
  private $email;
  private $clave;
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
	 * @param mixed  $codigo  
	 */
	public function setCodigo($codigo)
	{
		$this->codigo = $codigo;
	}

  /**
   * Get the value of rol
   */ 
  public function getRol(): Rol
  {
    return $this->rol;
  }

	/**
	 * Set the value of rol
	 *
	 * @param mixed  $rol  
	 */
	public function setRol(Rol $rol): void
	{
		$this->rol = $rol;
	}

  /**
   * Get the value of username
   */ 
  public function getUsername()
  {
    return $this->username;
  }

	/**
	 * Set the value of username
	 *
	 * @param mixed  $username  
	 */
	public function setUsername($username)
	{
		$this->username = $username;
	}

  /**
   * Get the value of email
   */ 
  public function getEmail()
  {
    return $this->email;
  }

	/**
	 * Set the value of email
	 *
	 * @param mixed  $email  
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

  

  /**
   * Get the value of clave
   */ 
  public function getClave()
  {
    return $this->clave;
  }

	/**
	 * Set the value of clave
	 *
	 * @param mixed  $clave  
	 */
	public function setClave($clave)
	{
		$this->clave = $clave;
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
	 * @param mixed  $fecha_registro  
	 */
	public function setFecha_registro($fecha_registro)
	{
		$this->fecha_registro = $fecha_registro;
	}

  /**
   * Get the value of fum
   */ 
  public function getFum()
  {
    return $this->fum;
  }

	/**
	 * Set the value of fum
	 *
	 * @param mixed  $fum  
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
