<?php
	
	namespace App\Controllers\Payments;

	use App\DAO\ClienteDao;
	use App\DAO\ProductoDao;
	
class PaymentController
{
		
		public function checkout(){

			session_start();

			if ( isset( $_GET['param'] ) ) {

				$producto_id = $_GET['param'];
				$usuario = $_SESSION['usuario'];
			
			}

			// mando a buscar al cliente, por el codigo de usuario en la sesion activa
			$clienteDao = new ClienteDao();
			$cliente = $clienteDao->find_by_user_id( $usuario->getCodigo() );

			// busco el producto con el codigo del mismo recibido por get
			$productoDao = new ProductoDao();
			$producto = $productoDao->find_by_id( $producto_id );

			
			require_once __DIR__ . '/../../../resources/views/payments/vw_checkout.php';
		}

		public function comprar() {

		}
		
}