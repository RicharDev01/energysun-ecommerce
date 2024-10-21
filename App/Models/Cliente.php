<?php
	
	namespace App\Models;
	
	class Cliente extends Usuario {
		
		private $codigo;
		private $primer_nombre;
		private $segundo_nombre;
		private $primer_apellido;
		private $segundo_apellido;
		private $fecha_nac;
		private $telefono;
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
		public function getPrimerNombre()
		{
			return $this->primer_nombre;
		}
		
		/**
		 * @param mixed $primer_nombre
		 */
		public function setPrimerNombre($primer_nombre): void
		{
			$this->primer_nombre = $primer_nombre;
		}
		
		/**
		 * @return mixed
		 */
		public function getSegundoNombre()
		{
			return $this->segundo_nombre;
		}
		
		/**
		 * @param mixed $segundo_nombre
		 */
		public function setSegundoNombre($segundo_nombre): void
		{
			$this->segundo_nombre = $segundo_nombre;
		}
		
		/**
		 * @return mixed
		 */
		public function getPrimerApellido()
		{
			return $this->primer_apellido;
		}
		
		/**
		 * @param mixed $primer_apellido
		 */
		public function setPrimerApellido($primer_apellido): void
		{
			$this->primer_apellido = $primer_apellido;
		}
		
		/**
		 * @return mixed
		 */
		public function getSegundoApellido()
		{
			return $this->segundo_apellido;
		}
		
		/**
		 * @param mixed $segundo_apellido
		 */
		public function setSegundoApellido($segundo_apellido): void
		{
			$this->segundo_apellido = $segundo_apellido;
		}
		
		/**
		 * @return mixed
		 */
		public function getFechaNac()
		{
			return $this->fecha_nac;
		}
		
		/**
		 * @param mixed $fecha_nac
		 */
		public function setFechaNac($fecha_nac): void
		{
			$this->fecha_nac = $fecha_nac;
		}
		
		/**
		 * @return mixed
		 */
		public function getTelefono()
		{
			return $this->telefono;
		}
		
		/**
		 * @param mixed $telefono
		 */
		public function setTelefono($telefono): void
		{
			$this->telefono = $telefono;
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