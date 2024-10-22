
<?php
	
	use App\Config\Parameters;
    
    session_start();
	
	// Verificar si la sesión está iniciada
	if (!isset($_SESSION['identity'])) {
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

       </main>
       
   </div>
    
</section>


<?php
    require_once __DIR__ . "/layouts/footer.php";
?>
