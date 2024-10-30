<?php

use App\Config\Parameters;
use App\Controllers\Dashboard\ProductoController;

session_start();

// Verificar si la sesión está iniciada
if (!isset($_SESSION['usuario'])) {
	echo '<h1>Para acceder debe iniciar sesión</h1>';
	echo '<a href="' . Parameters::BASE_URL . '/auth/login/vista">Iniciar sesion</a>';
	exit;
}

// Verificar si el usuario es administrador
if (!isset($_SESSION['ADMINISTRADOR'])) {
	echo '<h1>No tiene permisos para ver este contenido</h1>';
	echo '<a href="' . Parameters::BASE_URL . '">Regresar</a>';
	exit;
}

require_once __DIR__ . "/layouts/navbar.php";

$formatter = new NumberFormatter( "en_US", NumberFormatter::CURRENCY );

?>

<section class="container-fluid h-100">

	<div class="row h-100">

		<?php require_once __DIR__ . '/layouts/sidebar.php'; ?>

		<main class="col-10 container">

			<h1> Bienvenido a tu panel admnistrativo /dashboard </h1>

			<div class="row justify-content-center">

				<article style="width: 300px;" class="card text-white bg-primary col-sm-12 col-md-6 col-lg-4 col-xl-3 m-1 ">
					<i class="display-5 bi bi-cash-coin"></i>
					<div class="card-body">
						<h4 class="card-title">Total recaudado</h4>
						<p class="card-text display-6 fw-bold"> <?= $formatter->formatCurrency( $total_recaudado, 'USD')?> </p>
					</div>
				</article>

				<article style="width: 300px;" class="card text-white bg-success col-sm-12 col-md-6 col-lg-4 col-xl-3 m-1 ">
					<i class="display-5 bi bi-receipt"></i>
					<div class="card-body">
						<h4 class="card-title">Total de ordenes</h4>
						<p class="card-text display-6 fw-bold"> <?= $total_ordenes ?> </p>
					</div>
				</article>

				<article style="width: 300px;" class="card text-white bg-warning col-sm-12 col-md-6 col-lg-4 col-xl-3 m-1 ">
					<i class="display-5 bi bi-people"></i>
					<div class="card-body">
						<h4 class="card-title">Total de clientes</h4>
						<p class="card-text display-6 fw-bold"> <?= $total_clientes ?> </p>
					</div>
				</article>

				<article style="width: 300px;" class="card text-white bg-info col-sm-12 col-md-6 col-lg-4 col-xl-3 m-1 ">
					<i class="display-5 bi bi-truck"></i>
					<div class="card-body">
						<h4 class="card-title">Total de envios</h4>
						<p class="card-text display-6 fw-bold"> <?= $total_envios ?> </p>
					</div>
				</article>

			</div>

			<section class="card my-4">

				<div class="card-header">
					<h2 class="mx-5">Top de productos</h2>
				</div>

				<div class="row gx-2 justify-content-center card-body">

					<?php foreach ($top_sell_products as $prod): ?>

						<article class="card m-2 col-sm-12 col-md-6 col-lg-4 col-xl-3" style="width: 18rem;">
							<img
								src="<?= $prod['PROD_IMAGEN_URL'] ?>"
								class="card-img-top" alt="..." style="height: 250px; object-fit: cover;">

							<div class="card-body">
								<h5 class="card-title"><?= $prod['PROD_NOMBRE'] ?></h5>

								<a href="<?= Parameters::BASE_URL ?>/productos/producto/ver_producto/<?= $prod['PROD_CODIGO'] ?>" class="btn btn-primary">Ver
									prodcuto</a>
							</div>
						</article>
					<?php endforeach; ?>

				</div> <!-- fin del row -->

			</section>

		</main>

	</div>

</section>


<?php
require_once __DIR__ . "/layouts/footer.php";
?>