<?php

	$header = __DIR__ . '/../layouts/header.php';
	
	require_once $header;

?>

<main class="container">
	<h1> <?= $compra_message ?> </h1>
<!--	<h1>Compra Realizada</h1>-->
</main>


<?php
	$footer = __DIR__ . '/../layouts/footer.php';
	require_once $footer;
?>