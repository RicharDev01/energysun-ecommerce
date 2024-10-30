<?php

use App\Config\Parameters;

	$header = __DIR__ . '/../layouts/header.php';
	
	require_once $header;

?>

<main class="container mt-4">

  <h1>Gracias Por su compra</h1>
  <a href=" <?= Parameters::BASE_URL ?>/productos/producto/lista"> Ver más productos </a>

</main>


<?php
	$footer = __DIR__ . '/../layouts/footer.php';
	require_once $footer;
?>