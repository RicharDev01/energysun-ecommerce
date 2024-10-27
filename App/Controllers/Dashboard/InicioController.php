<?php
	
	namespace App\Controllers\Dashboard;

use App\DAO\ClienteDao;

class InicioController {

	// private ClienteDao $clienteDao;

	public function __construct(){
		// $clienteDao = new ClienteDao();
	}
	
	public function vista() {
		$clienteDao = new ClienteDao();
		$total_clientes = $clienteDao->obtener_total_clientes();

		require_once __DIR__ . "/../../../resources/views/dashboard/vw_dashboard.php";
	}
	
}