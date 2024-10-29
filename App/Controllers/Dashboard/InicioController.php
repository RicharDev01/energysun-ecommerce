<?php
	
	namespace App\Controllers\Dashboard;

use App\DAO\ClienteDao;
use App\DAO\EnvioDao;
use App\DAO\FacturaDao;
use App\DAO\ProductoDao;

class InicioController {

	// private ClienteDao $clienteDao;

	public function __construct(){
		// $clienteDao = new ClienteDao();
	}
	
	public function vista() {

		// obtener el total de clientes registrados
		$clienteDao = new ClienteDao();
		$total_clientes = $clienteDao->obtener_total_clientes();

    // devuelvo la lista de los productos mas vendidos
		$productoDao = new ProductoDao();
    $top_sell_products = $productoDao->top_sell_products();

		// TOTAL DE LOS ENVIOS REGISTRADOS EN ESTADO PENDIENTE Y EN RUTA
		$envioDao = new EnvioDao();
    $total_envios = $envioDao->total_envios();

		// TOTAL DE LAS ORDENES REGISTRADAS EN EL SISTEMAS (FACTURAS)
		$facturaDao = new FacturaDao();
		$total_ordenes = $facturaDao->total_ordenes();

		// OBTENER EL TOTAL DE DINERO RECAUDADO
		$total_recaudado = $facturaDao->total_recaudado();

		require_once __DIR__ . "/../../../resources/views/dashboard/vw_dashboard.php";
	}
	
}