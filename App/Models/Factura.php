<?php 

namespace App\Models;

class Factura {

  private int $codigo_factura;
  private Cliente $cliente;
  private $fecha_emision;
  private string $metodo_pago;


  /**
   * Get the value of codigo_factura
   */ 
  public function getCodigo_factura()
  {
    return $this->codigo_factura;
  }

	/**
	 * Set the value of codigo_factura
	 *
	 * @param mixed  $codigo_factura  
	 */
	public function setCodigo_factura($codigo_factura)
	{
		$this->codigo_factura = $codigo_factura;
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
   * Get the value of fecha_emision
   */ 
  public function getFecha_emision()
  {
    return $this->fecha_emision;
  }

	/**
	 * Set the value of fecha_emision
	 *
	 * @param mixed  $fecha_emision  
	 */
	public function setFecha_emision($fecha_emision)
	{
		$this->fecha_emision = $fecha_emision;
	}

  /**
   * Get the value of metodo_pago
   */ 
  public function getMetodo_pago()
  {
    return $this->metodo_pago;
  }

	/**
	 * Set the value of metodo_pago
	 *
	 * @param mixed  $metodo_pago  
	 */
	public function setMetodo_pago($metodo_pago)
	{
		$this->metodo_pago = $metodo_pago;
	}
}