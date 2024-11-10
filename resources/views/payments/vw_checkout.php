<?php

use App\Config\Parameters;
use App\Helpers\Helpers;

$header = __DIR__ . '/../layouts/header.php';

require_once $header;

date_default_timezone_set('America/El_Salvador');
$formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

?>

<main class="container">

	<?php if (isset($_SESSION['error_checkout']) and $_SESSION['error_checkout']): ?>
		<section class="message-alert alert-warning">

			<p class="message-content"> <?= $_SESSION['error_checkout'] ?> </p>

		</section>
	<?php endif; ?>

	<section class="checkout">
		<!-- DETALLES DEL PRODUCTO Y EL CLIENTE, COMO LOS NOMBRES  -->

		<article class="checkout__info">

			<div class="checkout__form-info">
				<div class="form__group">
					<label for="nombre-cliente" class="form__label"> Cliente: </label>
					<input type="text" name="" id="nombre-cliente" value="<?= $cliente->getFullName() ?>" class="form__input"
						readonly style="font-size: 14px; width: 300px;">
				</div>

				<div class="form__group">
					<label for="fecha-factura" class="form__label"> Fecha: </label>
					<input
						type="text"
						name="fecha-factura"
						id="fecha-factura" 
						value="<?php echo ( new DateTime($factura_recuperada->getFecha_emision() ) )->format('d/m/Y H:i:s'); ?>"

						class="form__input" readonly style="font-size: 13px; width: 180px;">
				</div>
			</div>

			<h2>Lista de Productos</h2>

			<article class="card">

				<section class="card__header">
					<!-- CONSIDERACION DE VIñETAS DE NUEVO O OFERTA O AMBAS-->
					<div class="card__vignettes">

						<?php if (Helpers::determinar_estado_producto($producto->getFecha_reg()) === "nuevo"): ?>

							<span class="vignette__new">Nuevo</span>

						<?php endif; ?>


						<?php if ($producto->getDescuento() > 0 && $producto->getDescuento() <= 1): ?>

							<span class="vignette__off"> <span>Off</span> <span>
									<?php echo Helpers::decimal_a_porcentaje($producto->getDescuento()) ?> </span> </span>

						<?php endif; ?>


					</div>
					<!-- <img
						src="<?= Parameters::BASE_URL . '/resources/images/kit-solar-vivienda-aislada-5200w-48v-con-bateria-litio-dc-solar_thumb_main.jpg' ?>"
						alt="Kit solar" class="card__image"> -->
					<img src="<?= $producto->getImagen_url() ?>" alt="Kit solar" class="card__image">
				</section>

				<section class="card__body">

					<h3 class="card__title"> <?= $producto->getNombre() ?> </h3>

				</section>

				<section class="card__footer">

					<div class="card__price">

						<?php if ($producto->getDescuento() > 0 && $producto->getDescuento() <= 1): ?>
							<span class="card__price--discount">
								<?php echo $formatter->formatCurrency($producto->getPrecio(), 'USD'); ?>
							</span>
						<?php endif; ?>

						<span class="">
							<?php
							$precio_con_decuento = Helpers::aplicar_descuento($producto->getPrecio(), $producto->getDescuento());
							echo $formatter->formatCurrency($precio_con_decuento, 'USD');
							?>
						</span>
					</div>


				</section>

			</article>

		</article>


		<!-- RESUMEN DE LA COMPRA, IMPUESTO Y DESCUENTOS -->
		<form method="post" action="<?= Parameters::BASE_URL ?>/payments/payment/finalizar_compra"
			class="checkout__summary">
			<h2 class="summary__title">Factura # 00<?= $factura_recuperada->getCodigo_factura(); ?> </h2>

			<input type="hidden" name="facturaId" id="facturaId" value="<?= $factura_recuperada->getCodigo_factura(); ?>">
			<input type="hidden" name="producto_id" id="producto_id" value="<?= $producto->getCodigo(); ?>">

			<table class="summary__table">

				<thead>
					<tr>
						<th>Código Prod.</th>
						<th>Cantidad</th>
					</tr>
				</thead>

				<tbody>

					<tr>
						<td> 000<?php echo $producto->getCodigo(); ?> </td>
						<td>
							<input type="number" name="cantidad" class="form__input" style="width: 100px;" value="1" id="cantidad"
								min="1" required>
						</td>
					</tr>

					<tr>
						<td>Precio de venta</td>
						<td> <?= $formatter->formatCurrency($producto->getPrecio(), 'USD') ?> </td>
					</tr>

					<tr>
						<td>IVA</td>
						<td> <?= Helpers::decimal_a_porcentaje(Parameters::IVA) ?> </td>
						<input type="hidden" name="impuesto" value="<?= Parameters::IVA ?>">
					</tr>

					<tr>
						<td>Descuentos</td>
						<td> <?= Helpers::decimal_a_porcentaje($producto->getDescuento()) ?> </td>
						<input type="hidden" name="descuento" value="<?= $producto->getDescuento(); ?>">
					</tr>

					<tr>
						<td>Total</td>
						<td>
							<strong style="font-size: 1.8rem; color: #9EF37A;" id="precio-total">

							</strong>
							<!-- <input type="hidden" name="total" value="<?= $precio_total ?>"> -->
							<input type="hidden" name="total" id="total" value=""> <!-- Dinamicamente con JS, se agregara el total -->
						</td>
					</tr>

				</tbody>

				<tfoot>
					<tr>
						<td colspan="2">
							<select name="medio-pago" id="medio-pago" class="form__input" required>
								<option value="">Seleccione el medio de pago</option>
								<option value="Medio Electrónico" selected>Medio Electrónico</option>
								<option value="PayPal">PayPal</option>
								<option value="Wompi">Wompi</option>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<button type="submit" class="btn btn-primary btn-lg"> FINALIZAR COMPRA </button>
						</td>
					</tr>
				</tfoot>

			</table>

		</form>


	</section>

	<script>
		addEventListener("DOMContentLoaded", () => {
			const cantidadCompra = document.getElementById("cantidad")
			const precioTotal = document.getElementById("precio-total")
			const totalInput = document.getElementById('total')

			// datos tomados de PHP
			const precioProducto = <?= json_encode($producto->getPrecio()) ?>;
			const IVA = <?= json_encode( 1 + Parameters::IVA ) ?>;
			const valorDescuento = <?= json_encode( $producto->getDescuento() ) ?>;


			if (precioTotal
				&& cantidadCompra
				&& parseInt(cantidadCompra.value) > 0
				&& cantidadCompra.value !== '' && totalInput) {

				// multiplicamos por la cantidad
				let precioPorCantidad = cantidadCompra.value * precioProducto
				// le agregamos los impuestos a la compra
				let precioConImpuestos = (precioPorCantidad * IVA)
				// aplicamos descuentos si aplican (seria el subtotal)
				let subtotal = precioConImpuestos - (precioConImpuestos * valorDescuento)
				precioTotal.textContent = `$${subtotal.toFixed(2)}`

				totalInput.value = subtotal.toFixed(2)

				// se repite el proceso, cuando la cantidad cambie
				cantidadCompra.addEventListener("change", () => {

					// multiplicamos por la cantidad
					precioPorCantidad = cantidadCompra.value * precioProducto
					// le agregamos los impuestos a la compra
					precioConImpuestos = (precioPorCantidad * IVA)
					// aplicamos descuentos si aplican (seria el subtotal)
					subtotal = precioConImpuestos - (precioConImpuestos * valorDescuento)

					precioTotal.textContent = `$${subtotal.toFixed(2)}`

					totalInput.value = subtotal.toFixed(2)

				})

			} else {
				alert("La cantidad no puede ser inferior a 0 ni vacia")
			}
		}) // fin de DOMContentrLoad

	</script>

</main>


<?php
$footer = __DIR__ . '/../layouts/footer.php';
require_once $footer;
?>