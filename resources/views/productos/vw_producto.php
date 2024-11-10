<?php

use App\Config\Parameters;
use App\Controllers\Productos\ProductoController;
use App\Helpers\Helpers;

$header = __DIR__ . '/../layouts/header.php';

require_once $header;

$formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

$producto_control = new ProductoController();

?>


<main class="container">

  <section class="product">

    <div class="product__image">
      <!-- CONSIDERACION DE VIñETAS DE NUEVO O OFERTA O AMBAS-->
      <div class="card__vignettes">

        <?php if (Helpers::determinar_estado_producto($producto->getFecha_reg()) === "nuevo"): ?>

          <span class="vignette__new">Nuevo</span>

        <?php endif; ?>


        <?php if ($producto->getDescuento() > 0 && $producto->getDescuento() <= 1): ?>

          <span class="vignette__off"> <span>Off</span> <span>
            <?php echo Helpers::decimal_a_porcentaje($producto->getDescuento()) ?> </span> 
          </span>

        <?php endif; ?>


      </div>

      <img src="<?= $producto->getImagen_url() ?>" alt="Imagen del producto x">
    </div>


    <article class="product__content">
      <h2> <?= $producto->getNombre() ?> </h2>

      <section class="product__buy">

        <div class="product__price">
         <?php if( $producto->getDescuento() > 0 && $producto->getDescuento() <= 1): ?>
          <span class="product__price--through">  
            <?= $formatter->formatCurrency($producto->getPrecio(), 'USD' ) ?>
          </span>
         <?php endif; ?>

          <span class="product__price--real"> 
            <?php 
              echo $formatter->formatCurrency( Helpers::aplicar_descuento( $producto->getPrecio(), $producto->getDescuento() ), 'USD'); ?>
          </span>

          <!-- <span class="product__price--real"> <?php echo $codigo_producto; ?> </span> -->
        </div>

        <?php if (isset($_SESSION['usuario'])): ?>

          <a href="<?= Parameters::BASE_URL ?>/Payments/Payment/checkout/<?= $producto->getCodigo() ?>" class="btn btn-primary btn-lg">Comprar</a>

        <?php else: ?>
          <div class="message-alert alert-warning">
            <img src="<?= Parameters::BASE_URL . '/resources/images/icons/icon-error.svg' ?>" class=""
              alt="Icono del delivery" />

            <div class="message-content">
              <h3>Debe iniciar sesion, para poder hacer una compra</h3>
            </div>

          </div>
        <?php endif; ?>


      </section>

      <p class="product__extract"> <?= $producto->getExtract() ?> </p>

      <!-- ESTO SERA CONDICIONAL, SI EL PRECIO ES MAYOR A MIL ENVIO ES GRATIS -->
      <?php if ( Helpers::aplicar_descuento( $producto->getPrecio(), $producto->getDescuento() ) >= 1500): ?>
        <div class="message-delivery">
          <img src="<?= Parameters::BASE_URL . '/resources/images/icons/icon-delivery.svg' ?>" class=""
            alt="Icono del delivery" />

          <div class="delivery-content">
            <h3>Envio gratuito por la compra de este producto</h3>
            <p>Por la compra del siguiente articulo, el envio es totalmente gratuito</p>
          </div>

        </div>
      <?php endif; ?>


    </article>

    <section class="product__status">

      <a href="#" class="product__category"> <span> Categoria: </span> <?= $producto->getCategoria()->getNombre() ?></a>
      <p class="product__stock"> <span>En existencias: </span> <span> <?= $producto->getStock() ?> </span> </p>

    </section>

  </section>

  <article class="product-description">

    <div class="content">
      <h3>Sobre el producto</h3>

      <?= $producto->getDescripcion() ?>

    </div>

    <div class="publicidad">
      <a href="<?= Parameters::BASE_URL . '/productos/producto/filtro/1' ?>" class="">

        <img src="<?= Parameters::BASE_URL . '/resources/images/banner-lateral.png' ?>" alt="">
      </a>
    </div>

  </article>


  <h3 class="relacionado">Producto que pueden interesarte</h3>

  <section class="products-list">

    <!-- LISTA D EPRODUCTOS -->
    <?php foreach ($producto_control->relacionados( $producto->getCategoria()->getCodigo(), $producto->getCodigo() ) as $producto): ?>

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

          <p class="card__description">
            <?= $producto->getExtract() ?>
          </p>

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

          <a class="btn btn-primary card__button"
            href="<?php echo Parameters::BASE_URL . '/productos/producto/ver_producto/' . $producto->getCodigo() ?>">Ver
            producto</a>
        </section>

      </article>

    <?php endforeach; ?>

  </section>

</main>


<?php
$footer = __DIR__ . '/../layouts/footer.php';
require_once $footer; ?>