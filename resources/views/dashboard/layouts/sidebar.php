<?php

use App\Config\Parameters;

?>

<aside class="col-2 bg-green-dark text-light">
  <!-- encabezado del sidbar -->
  <article class="d-flex flex-column align-items-center">

    <i class="bi bi-person-circle display-3 mb-2"></i>

    <?php if( isset( $_SESSION['usuario'] ) ): ?>
      <h2 class="h6 mb-4"> <?php echo $_SESSION['usuario']->getEmail(); ?> </h2>
    <?php endif; ?>

  </article>

  <ul class="list-group ">

    <li class="">
      <a href="<?= Parameters::BASE_URL?>/dashboard/inicio/vista" class="bg-green-dark list-group-item list-group-item-action d-flex justify-content-between">
        <span class=""> <i class="bi bi-grid"></i> Dashboard</span>
        <!--                       <span class="badge text-bg-primary rounded-pill">14</span>-->
      </a>
    </li>

    <li>
      <a href="<?= Parameters::BASE_URL?>/dashboard/usuario/vista" class="bg-green-dark list-group-item list-group-item-action d-flex justify-content-between">
        <span class=""> <i class="bi bi-people"></i> Usuarios</span>
        <span class="badge text-bg-primary rounded-pill">8</span>
      </a>
    </li>

    <li>
      <a href="<?= Parameters::BASE_URL?>/dashboard/producto/vista" class="bg-green-dark list-group-item list-group-item-action d-flex justify-content-between">
        <span class=""> <i class="bi bi-box-seam"></i> Productos</span>
        <span class="badge text-bg-danger rounded-pill">-6</span>
      </a>
    </li>

    <li>
      <a href="<?= Parameters::BASE_URL?>/dashboard/categoria/vista" class="bg-green-dark list-group-item list-group-item-action d-flex justify-content-between">
        <span class=""> <i class="bi bi-tags"></i> Categorias</span>
        <!--                       <span class="badge text-bg-primary rounded-pill">14</span>-->
      </a>
    </li>

    <li>
      <a href="<?= Parameters::BASE_URL?>/dashboard/visita/vista" class="bg-green-dark list-group-item list-group-item-action d-flex justify-content-between">
        <span class=""> <i class="bi bi-geo-alt"></i> Visitas</span>
        <span class="badge text-bg-primary rounded-pill">7</span>
      </a>
    </li>

    <li>
      <a href="<?= Parameters::BASE_URL?>/dashboard/evaluacion/vista" class="bg-green-dark list-group-item list-group-item-action d-flex justify-content-between">
        <span class=""> <i class="bi bi-list-check"></i> Evaluaciones</span>
        <span class="badge text-bg-primary rounded-pill">2</span>
      </a>
    </li>

    <!-- <li>
      <a href="<?= Parameters::BASE_URL?>/dashboard/envio/vista" class="bg-green-dark list-group-item list-group-item-action d-flex justify-content-between">
        <span class=""> <i class="bi bi-truck"></i> Envios</span>
        <span class="badge text-bg-primary rounded-pill">10</span>
      </a>
    </li>

    <li>
      <a href="<?= Parameters::BASE_URL?>/dashboard/factura/vista" class="bg-green-dark list-group-item list-group-item-action d-flex justify-content-between">
        <span class=""> <i class="bi bi-receipt"></i> Facturas</span>
        <span class="badge text-bg-primary rounded-pill">16</span>
      </a>
    </li>

    <li>
      <a href="<?= Parameters::BASE_URL?>/dashboard/rol/vista" class="bg-green-dark list-group-item list-group-item-action d-flex justify-content-between">
        <span class=""> <i class="bi bi-key"></i> Roles</span>
          /// <span class="badge text-bg-primary rounded-pill">14</span>
      </a>
    </li> -->

  </ul>

</aside>