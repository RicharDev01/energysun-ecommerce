<?php
	
	namespace App\Controllers\Payments;
	
class PaypalController
{
		
		public function comprar(){
			$compra_message = "Compra Realizada";
			
			require_once __DIR__ . '/../../../resources/views/payments/vw_paypal.php';
		}
		
}