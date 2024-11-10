<?php

use App\Config\Parameters;

$header = __DIR__ . '/../layouts/header.php';

require_once $header;

?>

<main class="container">

	<section class="success-purchase">

		<h1 class="purchase__title">Gracias por tu compra</h1>

		<section class="purchase__image">
			<img src="<?= Parameters::BASE_URL ?>/resources/images/buy_done.svg" alt="Purchase Success">
		</section>

		<section class="purchase__buttons">
			<a href=" <?= Parameters::BASE_URL ?>/productos/producto/lista" class="btn btn-bg-accent btn-lg" > Ver más productos </a>

			<?php if (isset($exito) and $exito): ?>

				<a href="<?= Parameters::BASE_URL . '/reporteria/reportPrinter/generar/' . $facturaId ?>" target="_blank"
					class="btn btn-primary btn-lg">Impirmir factura</a>

			<?php endif; ?>
		</section>

	</section>



</main>


<?php
$footer = __DIR__ . '/../layouts/footer.php';
require_once $footer;
?>