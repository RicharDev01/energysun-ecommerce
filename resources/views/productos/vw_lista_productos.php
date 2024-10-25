<?php

use App\Config\Parameters;

$header = __DIR__ . '/../layouts/header.php';

require_once $header;

use App\Controllers\Categorias\CategoriaController;
use App\Controllers\Productos\ProductoController;
use App\Models\Producto;

$categoria_control = new CategoriaController();

$lista_categorias = $categoria_control->lista();

$formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

?>

<main class="container">

  <?php
  if (isset($verificado)) {
    echo $verificado;
  }
  ?>

  <!-- BANNER PUBLICITARIO, PUEDE SER INCLUSO UN SLIDER -->
  <section class="banner-publicitario">

    <article class="banner__content">
      <h3 class="">Electrificantes descuentos! Hasta un <span class="text-mark">35% OFF</span> en nuestros Kit solares
      </h3>

      <!-- <a href="<?= Parameters::BASE_URL . '/productos/producto/filtro/kit-solares' ?>" class="btn btn-danger btn-lg">Comprar ahora</a> -->
      <a href="#title-product" class="btn btn-danger btn-lg">Comprar ahora</a>
    </article>

    <div class="banner__image">
      <!-- <img 
      src="<?= Parameters::BASE_URL . '/resources/images/logo-energysun-blanco.png' ?>" 
      alt="logo de energusun"
      class="logo"> -->

      <img src="<?= Parameters::BASE_URL . '/resources/images/ingeniero-promo-banner-sin-fondo.png' ?>"
        alt="Banner promocional en compras de Kit de  panel solares" class="person">
    </div>

  </section>

  <!-- 
 UN NAVBAR DE FILTROS DE LOS PRODUCTOS
 CATEGORIAS:
 KIT SOLARES
 PANELES SOLARES
 BATERIAS
 INVERSORES
 REGULADORES DE CARGA
 RECIEN AGREGADOS, ULTIMOS AGREGADOS, MAS VENDIDOS 

 // TODO: AGREGAR ICONOS
-->
  <section class="filters">

    <nav class="filters__options">

      <?php foreach ($lista_categorias as $key => $categoria): ?>

        <button class="btn btn-danger"> <?= $categoria->getNombre() ?> </button>

      <?php endforeach; ?>

      <!-- <button class="btn btn-danger">KIT SOLARES</button>
    <button class="btn btn-danger">PANELES SOLARES</button>
    <button class="btn btn-danger">BATERIAS</button>
    <button class="btn btn-danger">INVERSORES</button>
    <button class="btn btn-danger">REGULADORES DE CARGA</button>
   -->
    </nav>

    <div class="filters__sortby">
      <select name="sortby" id="sortby" class="sortby__input">
        <option value="">RECIEN AGREGADOS</option>
        <option value="">MÁS ANTIGUOS</option>
        <option value="">MÁS VENDIDOS</option>
        <option value="">PRECIO MÁS BAJO</option>
        <option value="">PRECIO MÁS ALTO</option>
      </select>
    </div>

  </section>




  <!-- TITULO, PUEDE SER ALGO DINAMICO -->

  <h2 class="titulo-busqueda" id="title-product">Productos según tu búsqueda</h2>

  <!-- LA LISTA DE LOS PRODUCTOS, LOS CARD, QUE SEAN DE 4 COL EL SU VERSION MAS GRANDE -->
  <!-- 
  *LLEVARA IMAGEN DEL PRODUCTO COMO CABECERA, 
  *EN SU CUERPO LLEVARA EL NOMBRE DEL PRODUCTO, LA DESCRIPCION DEL PRODUCTO
  * EN SU FOOTER DEBERERA VERSE EL PRECIO Y UN BOTON DE COMPRAR EL PRODUCTO. O MAS DETALLES
  -->

  <!-- EJEMPLO DE DATOS: Kit Solar Vivienda Aislada 5200W 48V con Batería Litio DC Solar - 4.607,08€-->

  <section class="products-list">

    <!-- LISTA D EPRODUCTOS -->
    <?php foreach ($lista_productos as $producto ): ?>

      <article class="card">

        <section class="card__header">
          <!-- CONSIDERACION DE VIñETAS DE NUEVO O OFERTA O AMBAS-->
          <div class="card__vignettes">
            <span class="vignette__new">Nuevo</span>
            <span class="vignette__off"> <span>Off</span> <span>35%</span> </span>
          </div>
          <!-- <img
            src="<?= Parameters::BASE_URL . '/resources/images/kit-solar-vivienda-aislada-5200w-48v-con-bateria-litio-dc-solar_thumb_main.jpg' ?>"
            alt="Kit solar" class="card__image"> -->
          <img
            src="<?= $producto->getImagen_url() ?>"
            alt="Kit solar" class="card__image">
        </section>

        <section class="card__body">

          <h3 class="card__title"> <?= $producto->getNombre() ?> </h3>

          <p class="card__description">
            <?= $producto->getDescripcion() ?>
          </p>

        </section>

        <section class="card__footer">
          <span class="card__price"> <?php echo $formatter->formatCurrency($producto->getPrecio(), 'USD'); ?> </span>
          <a class="btn btn-primary card__button"
            href="<?php echo Parameters::BASE_URL . '/productos/producto/ver_producto/' . $producto->getCodigo() ?>">Ver producto</a>
        </section>

      </article>

    <?php endforeach; ?>



  </section>

</main>

<?php
$footer = __DIR__ . '/../layouts/footer.php';
require_once $footer; ?>