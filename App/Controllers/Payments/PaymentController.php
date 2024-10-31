<?php

namespace App\Controllers\Payments;

use App\Config\Parameters;
use App\DAO\ClienteDao;
use App\DAO\FacturaDao;
use App\DAO\ProductoDao;
use App\Models\Factura;

class PaymentController
{

	public function checkout()
	{

		date_default_timezone_set('America/Mexico_City');

		session_start();

		if (isset($_GET['param'])) {

			$producto_id = $_GET['param'];
			$usuario = $_SESSION['usuario'];

		}

		// mando a buscar al cliente, por el codigo de usuario en la sesion activa
		$clienteDao = new ClienteDao();
		$cliente = $clienteDao->find_by_user_id($usuario->getCodigo());

		if (!isset($cliente) && $cliente === null) {
			$_SESSION['error_checkout'] = 'El cliente no existe';
		}

		// busco el producto con el codigo del mismo recibido por get
		$productoDao = new ProductoDao();
		$producto = $productoDao->find_by_id($producto_id);

		$fecha_emision = date("Y-m-d H:i:s");

		$facturaDao = new FacturaDao();
		$id_factura = $facturaDao->save($cliente->getCodigoCliente(), $fecha_emision);

		if ($id_factura > 0) {
			# code...
			$factura_recuperada = $facturaDao->find_by_id($id_factura);

			require_once __DIR__ . '/../../../resources/views/payments/vw_checkout.php';
		}


	}

	public function finalizar_compra()
	{

		session_start();

		if (
			isset($_POST["facturaId"])
			&& isset($_POST["cantidad"])
			&& isset($_POST["impuesto"])
			&& isset($_POST["descuento"])
			&& isset($_POST["total"])
			&& isset($_POST["producto_id"])
		) {

			$facturaId = $_POST["facturaId"];
			$cantidad = $_POST["cantidad"];
			$impuesto = $_POST["impuesto"];
			$descuento = $_POST["descuento"];
			$total = $_POST["total"];
			$producto_id = $_POST["producto_id"];

			$facturaDao = new FacturaDao();
			$res = $facturaDao->guardadr_detalle_factura( $facturaId, $producto_id, $cantidad,$impuesto, $descuento, $total  );

			if ( $res ) {
				$exito = $res;
				require_once __DIR__ . '/../../../resources/views/payments/vw_buy_success.php';

			}

		}

	}

}