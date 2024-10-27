<?php

use App\Config\Parameters;

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
						<p class="card-text display-6 fw-bold"> $82,000.25 </p>
					</div>
				</article>

				<article style="width: 300px;" class="card text-white bg-success col-sm-12 col-md-6 col-lg-4 col-xl-3 m-1 ">
					<i class="display-5 bi bi-receipt"></i>
					<div class="card-body">
						<h4 class="card-title">Total de ordenes</h4>
						<p class="card-text display-6 fw-bold">57</p>
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
						<p class="card-text display-6 fw-bold">35</p>
					</div>
				</article>

			</div>

			<section class="card mt-3">

				<h2>Top de productos</h2>

				<div class="row gx-2 justify-content-center">

					<article class="card mx-2 col-sm-12 col-md-6 col-lg-4 col-xl-3" style="width: 18rem;">
						<img
							src="<?= Parameters::BASE_URL ?>/resources/images/kit-autoconsumo-trifasico-kostal-4200w-22000whdia_thumb_main.jpg"
							class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Kit de panel</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
								content.</p>
							<a href="#" class="btn btn-primary">Ver prodcuto</a>
						</div>
					</article>

					<article class="card mx-2 col-sm-12 col-md-6 col-lg-4 col-xl-3" style="width: 18rem;">
						<img
							src="<?= Parameters::BASE_URL ?>/resources/images/kit-autoconsumo-trifasico-kostal-4200w-22000whdia_thumb_main.jpg"
							class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Kit de panel</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
								content.</p>
							<a href="#" class="btn btn-primary">Ver prodcuto</a>
						</div>
					</article>

					<article class="card mx-2 col-sm-12 col-md-6 col-lg-4 col-xl-3" style="width: 18rem;">
						<img
							src="<?= Parameters::BASE_URL ?>/resources/images/kit-autoconsumo-trifasico-kostal-4200w-22000whdia_thumb_main.jpg"
							class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Kit de panel</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
								content.</p>
							<a href="#" class="btn btn-primary">Ver prodcuto</a>
						</div>
					</article>

					<article class="card mx-2 col-sm-12 col-md-6 col-lg-4 col-xl-3" style="width: 18rem;">
						<img
							src="<?= Parameters::BASE_URL ?>/resources/images/kit-autoconsumo-trifasico-kostal-4200w-22000whdia_thumb_main.jpg"
							class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Kit de panel</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
								content.</p>
							<a href="#" class="btn btn-primary">Ver prodcuto</a>
						</div>
					</article>

					
				</div> <!-- fin del row -->

			</section>

		</main>

	</div>

</section>


<?php
require_once __DIR__ . "/layouts/footer.php";
?>