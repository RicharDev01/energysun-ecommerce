<?php
	
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	use App\Config\Parameters;

?>
<!DOCTYPE html>
<html lang="es">

<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Panel Administrativo | EnergySun</title>
	
	<link rel="shortcut icon" href="<?= Parameters::BASE_URL . '/resources/images/logo-energysun-blanco.png' ?>"
	      type="image/x-icon">
	<link rel="stylesheet" href="<?= Parameters::BASE_URL . '/resources/styles/bootstrap.min.css' ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="<?= Parameters::BASE_URL . '/resources/styles/dashboard.css' ?>">

</head>

<body>

<!--  -->

<header>
	
	<nav class="navbar navbar-expand-lg bg-dark-accent navbar-dark">
		<section class="container">
			
			<a class="navbar-brand" href="<?= Parameters::BASE_URL ?>/dashboard/inicio/vista">EnergySun</a>
			<!--	BOTON MOBILE	-->
			<button class="navbar-toggler" type="button"
			        data-bs-toggle="collapse"
			        data-bs-target="#navbarSupportedContent"
			        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<section class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
				
				<form class="d-flex m-auto" role="search">
					<input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
					<button class="btn btn-outline-light" type="submit">Buscar</button>
				</form>
				
				<div class="dropdown">
					
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						
						<i class="bi bi-gear"></i>
						
						<?php if( isset( $_SESSION['usuario'] ) ): ?>
						<?php echo $_SESSION['usuario']->getUsername() ?>
						<?php endif; ?>
						
					</a>
					
					<ul class="dropdown-menu">
						<li><a class="dropdown-item text-bg-danger" href=" <?= Parameters::BASE_URL ?>/auth/login/cerrar_sesion">Cerrar session</a></li>
					</ul>
				
				</div>
			
			</section>
			
		</section>
	</nav>

</header>