<?php

use App\Config\Parameters;
use App\Helpers\Helpers;

$header = __DIR__ . '/../layouts/header.php';

require_once $header;

date_default_timezone_set('America/Mexico_City');
$formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

?>

<main class="container">

	<section class="checkout">
		<!-- DETALLES DEL PRODUCTO Y EL CLIENTE, COMO LOS NOMBRES  -->

		<article class="checkout__info">

			<div class="checkout__form-info"  >
				<div class="form__group">
					<label for="nombre-cliente" class="form__label"> Cliente: </label>
					<input type="text" name="" id="nombre-cliente" value="<?= $cliente->getFullName() ?>" class="form__input"
						readonly style="font-size: 14px; width: 300px;" >
				</div>

				<div class="form__group">
					<label for="fecha-factura" class="form__label"> Fecha: </label>
					<input type="text" name="" id="fecha-factura" value="<?php echo date("d/m/Y h:i:s a"); ?>" class="form__input"
						readonly style="font-size: 13px; width: 180px;">
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
           
          <?php if( $producto->getDescuento() > 0 && $producto->getDescuento() <= 1): ?>
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
		<article class="checkout__summary">
			<h2 class="summary__title" >Factura # 0001 </h2>

			<table class="summary__table">

				<thead>
					<tr>
						<th>Código Prod.</th>
						<th>Cantidad</th>
					</tr>
				</thead>

				<tbody>

					<tr>
						<td > 000<?php echo $producto->getCodigo(); ?> </td>
						<td>
							 <input type="number" 
							 	name="cantidad"
								class="form__input"
								style="width: 100px;"
								value="1"
								id="cantidad"
								min="1" readonly>
						</td>
					</tr>

					<tr>
						<td>Precio de venta</td>
						<td> <?= $formatter->formatCurrency( $producto->getPrecio(), 'USD' ) ?> </td>
					</tr>

					<tr>
						<td>IVA</td>
						<td> <?= Helpers::decimal_a_porcentaje( Parameters::IVA ) ?> </td>
					</tr>

					<tr>
						<td>Descuentos</td>
						<td> <?= Helpers::decimal_a_porcentaje( $producto->getDescuento() ) ?> </td>
					</tr>

					<tr>
						<td>Total</td>
						<td  > 
							<strong style="font-size: 1.8rem; color: #9EF37A;"id="precio-total" >
						<?php 
							$precio_con_impuestos = $producto->getPrecio() * ( 1 + Parameters::IVA );
							// Calcular el descuento sobre el precio con impuestos
							$precio_total = $precio_con_impuestos - ($producto->getDescuento() * $precio_con_impuestos);

							echo $formatter->formatCurrency( $precio_total, 'USD' ) ;
						?>
						</strong>
						</td>
					</tr>

				</tbody>

			</table>

		</article>


	</section>

	<!--	<h1>Compra Realizada</h1>-->
	<a href="<?= Parameters::BASE_URL ?>/reporteria/reportPrinter/generar">Imprimir reporte</a>
</main>


<?php
$footer = __DIR__ . '/../layouts/footer.php';
require_once $footer;
?>