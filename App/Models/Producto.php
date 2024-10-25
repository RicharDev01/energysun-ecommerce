<?php 


namespace App\Models;

class Producto {

  private int $codigo;
  private Categoria $categoria;
  private string $nombre;
  private float $precio;
  private string $extract;
  private string $descripcion;
  private string $imagen_url;
  private int $stock;
  private float $descuento;
  private string $estado;
  private $fecha_reg;
  private $fum;

  
  public function __construct(){

  }




	/**
	 * Get the value of codigo
	 *
	 * @return  mixed
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
	 * Get the value of categoria
	 *
	 * @return  mixed
	 */
	public function getCategoria()
	{
		return $this->categoria;
	}

	/**
	 * Set the value of categoria
	 *
	 * @param   mixed  $categoria  
	 *
	 */
	public function setCategoria($categoria)
	{
		$this->categoria = $categoria;
	}

	/**
	 * Get the value of nombre
	 *
	 * @return  mixed
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
	 * Get the value of precio
	 *
	 * @return  mixed
	 */
	public function getPrecio()
	{
		return $this->precio;
	}

	/**
	 * Set the value of precio
	 *
	 * @param   mixed  $precio  
	 *
	 */
	public function setPrecio($precio)
	{
		$this->precio = $precio;
	}

	/**
	 * Get the value of extract
	 *
	 * @return  mixed
	 */
	public function getExtract()
	{
		return $this->extract;
	}

	/**
	 * Set the value of extract
	 *
	 * @param   mixed  $extract  
	 *
	 */
	public function setExtract($extract)
	{
		$this->extract = $extract;
	}

	/**
	 * Get the value of descripcion
	 *
	 * @return  mixed
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
	 * Get the value of imagen_url
	 *
	 * @return  mixed
	 */
	public function getImagen_url()
	{
		return $this->imagen_url;
	}

	/**
	 * Set the value of imagen_url
	 *
	 * @param   mixed  $imagen_url  
	 *
	 */
	public function setImagen_url($imagen_url)
	{
		$this->imagen_url = $imagen_url;
	}

	/**
	 * Get the value of stock
	 *
	 * @return  mixed
	 */
	public function getStock()
	{
		return $this->stock;
	}

	/**
	 * Set the value of stock
	 *
	 * @param   mixed  $stock  
	 *
	 */
	public function setStock($stock)
	{
		$this->stock = $stock;
	}

	/**
	 * Get the value of descuento
	 *
	 * @return  mixed
	 */
	public function getDescuento()
	{
		return $this->descuento;
	}

	/**
	 * Set the value of descuento
	 *
	 * @param   mixed  $descuento  
	 *
	 */
	public function setDescuento($descuento)
	{
		$this->descuento = $descuento;
	}

	/**
	 * Get the value of estado
	 *
	 * @return  mixed
	 */
	public function getEstado()
	{
		return $this->estado;
	}

	/**
	 * Set the value of estado
	 *
	 * @param   mixed  $estado  
	 *
	 */
	public function setEstado($estado)
	{
		$this->estado = $estado;
	}

	/**
	 * Get the value of fecha_reg
	 *
	 * @return  mixed
	 */
	public function getFecha_reg()
	{
		return $this->fecha_reg;
	}

	/**
	 * Set the value of fecha_reg
	 *
	 * @param   mixed  $fecha_reg  
	 *
	 */
	public function setFecha_reg($fecha_reg)
	{
		$this->fecha_reg = $fecha_reg;
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
}