<?php 

namespace App\Models;

class Envio {

  private int $codigo_envio;
  private Cliente $cliente;
  private string $municipio;
  private string $direccion;
  private string $comentario;
  private string $estado;
  private $fecha_envio;

    


  /**
   * Get the value of codigo_envio
   */ 
  public function getCodigo_envio()
  {
    return $this->codigo_envio;
  }

	/**
	 * Set the value of codigo_envio
	 *
	 * @param mixed  $codigo_envio  
	 */
	public function setCodigo_envio($codigo_envio)
	{
		$this->codigo_envio = $codigo_envio;
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
   * Get the value of municipio
   */ 
  public function getMunicipio()
  {
    return $this->municipio;
  }

	/**
	 * Set the value of municipio
	 *
	 * @param mixed  $municipio  
	 */
	public function setMunicipio($municipio)
	{
		$this->municipio = $municipio;
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
   * Get the value of comentario
   */ 
  public function getComentario()
  {
    return $this->comentario;
  }

	/**
	 * Set the value of comentario
	 *
	 * @param mixed  $comentario  
	 */
	public function setComentario($comentario)
	{
		$this->comentario = $comentario;
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
   * Get the value of fecha_envio
   */ 
  public function getFecha_envio()
  {
    return $this->fecha_envio;
  }

	/**
	 * Set the value of fecha_envio
	 *
	 * @param mixed  $fecha_envio  
	 */
	public function setFecha_envio($fecha_envio)
	{
		$this->fecha_envio = $fecha_envio;
	}
}
