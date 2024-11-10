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
    date_default_timezone_set('America/El_Salvador');
    session_start();

    // Verificar si el ID del producto está en la URL
    if (isset($_GET['param'])) {
        $producto_id = $_GET['param'];
    } else {
        $_SESSION['error_checkout'] = 'No se especificó un producto';
        return;
    }

    // Si ya existe una factura en sesión y el producto es el mismo, cargar los datos desde sesión
    if (isset($_SESSION['factura_id'], $_SESSION['cliente'], $_SESSION['producto_id']) && $_SESSION['producto_id'] == $producto_id) {
        $facturaDao = new FacturaDao();
        $factura_recuperada = $facturaDao->find_by_id($_SESSION['factura_id']);
        $cliente = $_SESSION['cliente'];
        $productoDao = new ProductoDao();
        $producto = $productoDao->find_by_id($producto_id);
        
        require_once __DIR__ . '/../../../resources/views/payments/vw_checkout.php';
        return;
    }

    // Si el producto ha cambiado o no existe factura en sesión, iniciar un nuevo proceso
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
    } else {
        $_SESSION['error_checkout'] = 'Sesión de usuario no activa';
        return;
    }

    // Obtener el cliente y producto basado en la información actual
    $clienteDao = new ClienteDao();
    $cliente = $clienteDao->find_by_user_id($usuario->getCodigo());
    $productoDao = new ProductoDao();
    $producto = $productoDao->find_by_id($producto_id);

    if (!$cliente || !$producto) {
        $_SESSION['error_checkout'] = 'Cliente o producto no encontrados';
        return;
    }

    // Guardar nueva factura en base de datos
    $fecha_emision = date("Y-m-d H:i:s");
    $facturaDao = new FacturaDao();
    $id_factura = $facturaDao->save($cliente->getCodigoCliente(), $fecha_emision);

    // Almacenar datos actuales en sesión
    $_SESSION['factura_id'] = $id_factura;
    $_SESSION['cliente'] = $cliente;
    $_SESSION['producto_id'] = $producto_id;

    // Recuperar la factura para mostrar en la vista
    $factura_recuperada = $facturaDao->find_by_id($id_factura);
    
    require_once __DIR__ . '/../../../resources/views/payments/vw_checkout.php';
}


	public function finalizar_compra()
	{

		session_start();

		if (
			isset( $_POST["facturaId"] )
			&& isset( $_POST["cantidad"] )
			&& isset( $_POST["impuesto"] )
			&& isset( $_POST["descuento"] )
			&& isset( $_POST["total"] )
			&& isset( $_POST["producto_id"] )
			&& isset( $_POST["medio-pago"] ) 
		) {

			$facturaId = $_POST["facturaId"];
			$cantidad = $_POST["cantidad"];
			$impuesto = $_POST["impuesto"];
			$descuento = $_POST["descuento"];
			$total = $_POST["total"];
			$producto_id = $_POST["producto_id"];
			$medio_pago = $_POST["medio-pago"];

			$facturaDao = new FacturaDao();
			$res = $facturaDao->guardadr_detalle_factura($facturaId, $producto_id, $cantidad, $impuesto, $descuento, $total);
			$facturaDao->actualizar_factura( $facturaId, $medio_pago );

			if ($res) {
				$exito = $res;
				require_once __DIR__ . '/../../../resources/views/payments/vw_buy_success.php';

			}

		} else {

		}

	}

}