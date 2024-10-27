<?php 

namespace App\Models;

class Visita {

  private int $codigo;
  private Usuario $usuario;
  private Cliente $cliente;
  private $fecha;
  private $hora;
  private string $direccion;
  private string $estado;
  private $fecha_reg;



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
   * Get the value of usuario
   */ 
  public function getUsuario()
  {
    return $this->usuario;
  }

	/**
	 * Set the value of usuario
	 *
	 * @param mixed  $usuario  
	 */
	public function setUsuario($usuario)
	{
		$this->usuario = $usuario;
	}

  /**
   * Get the value of cliente
   */ 
  public function getCliente()
  {
    return $this->cliente;
  }

	/**
	 * Set the value of cliente
	 *
	 * @param mixed  $cliente  
	 */
	public function setCliente($cliente)
	{
		$this->cliente = $cliente;
	}

  /**
   * Get the value of fecha
   */ 
  public function getFecha()
  {
    return $this->fecha;
  }

	/**
	 * Set the value of fecha
	 *
	 * @param mixed  $fecha  
	 */
	public function setFecha($fecha)
	{
		$this->fecha = $fecha;
	}

  /**
   * Get the value of hora
   */ 
  public function getHora()
  {
    return $this->hora;
  }

	/**
	 * Set the value of hora
	 *
	 * @param mixed  $hora  
	 */
	public function setHora($hora)
	{
		$this->hora = $hora;
	}

  /**
   * Get the value of direccion
   */ 
  public function getDireccion()
  {
    return $this->direccion;
  }

	/**
	 * Set the value of direccion
	 *
	 * @param mixed  $direccion  
	 */
	public function setDireccion($direccion)
	{
		$this->direccion = $direccion;
	}

  /**
   * Get the value of estado
   */ 
  public function getEstado()
  {
    return $this->estado;
  }

	/**
	 * Set the value of estado
	 *
	 * @param mixed  $estado  
	 */
	public function setEstado($estado)
	{
		$this->estado = $estado;
	}

  /**
   * Get the value of fecha_reg
   */ 
  public function getFecha_reg()
  {
    return $this->fecha_reg;
  }

	/**
	 * Set the value of fecha_reg
	 *
	 * @param mixed  $fecha_reg  
	 */
	public function setFecha_reg($fecha_reg)
	{
		$this->fecha_reg = $fecha_reg;
	}
}