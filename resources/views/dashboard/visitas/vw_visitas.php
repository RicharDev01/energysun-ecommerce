<?php

use App\Config\Parameters;

session_start();

// Verificar si la sesión está iniciada
if (!isset($_SESSION['usuario'])) {
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

require_once __DIR__ . "/../layouts/navbar.php";

?>

<section class="container-fluid h-100">

  <div class="row h-100">

    <?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

    <main class="col-10 container ">

      <h1> Bienvenido a tu panel admnistrativo /visitas </h1>

      <div class="row g-4">

        <?php foreach ($lista_visitas as $visita): ?>

          <div class="col-sm-12 col-md-6 col-lg-4">

            <article class="card">

              <section class="card-header d-flex justify-content-between">
                <h2 class="h5">
                  <?php echo $visita->getCliente()->getPrimerNombre() . " " . $visita->getCliente()->getPrimerApellido() ?>
                </h2>

                <span class="badge  
                  <?php
                  switch ($visita->getEstado()) {
                    case 'PENDIENTE ASIGNAR':
                      echo 'text-bg-warning';
                      break;
                    case 'EN RUTA':
                      echo 'text-bg-info';
                      break;
                    case 'FINALIZADA':
                      echo 'text-bg-success';
                      break;
                    case 'CANCELADA':
                      echo 'text-bg-danger';
                      break;

                    default:
                      echo '';
                      break;
                  }
                  ?>
                  d-flex align-items-center"> <?= $visita->getEstado() ?> </span>
              </section>

              <section class="card-body">
                <p>FECHA: <?= $visita->getFecha() ?> </p>
                <p>HORA: <?= $visita->getHora() ?> </p>
                <hr class="divider">
                <p> <?= $visita->getDireccion() ?> </p>
              </section>

              <section class="card-footer d-grid">

                <?php if ($visita->getEstado() === 'PENDIENTE ASIGNAR'): ?>
                  <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#asiganrVisitaModal<?= $visita->getCodigo() ?>">
                    Asignar visita
                  </a>
                <?php else: ?>
                  <p> Visitador Asignado: <strong> <?= $visita->getUsuario()->getUsername() ?> </strong> </p>
                <?php endif; ?>

              </section>

            </article>
          </div>

          <!-- MODAL PARA ASIGANR VISITA A UN VISITADOR -->
          <!-- Modal -->
          <section class="modal fade" id="asiganrVisitaModal<?= $visita->getCodigo() ?>" tabindex="-1"
            aria-labelledby="asiganrVisitaModalLabel" aria-hidden="true">

            <section class="modal-dialog">

              <article class="modal-content">

                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="asiganrVisitaModalLabel">ASIGNAR LA VISITA
                    #0<?= $visita->getCodigo() ?> </h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= Parameters::BASE_URL ?>/dashboard/visita/asignar" method="post">

                  <input type="hidden" name="visita-id" value="<?= $visita->getCodigo() ?>">

                  <div class="modal-body">

                    <div class="mb-3">
                      <label for="visitadorAsignar" class="form-label"> Seleccione al visitador </label>
                      <select type="visitadorAsignar" class="form-control" id="visitadorAsignar" name="visitador-id">

                        <?php foreach ($lista_visitadores as $visitador): ?>
                          <option value="<?= $visitador->getCodigo() ?>"> <?= $visitador->getUsername() ?> </option>
                        <?php endforeach; ?>

                        <!-- <option value="2">Agustin</option>
              <option value="3">Mateo</option> -->
                      </select>
                    </div>

                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Asignar</button>
                  </div>

                </form>

              </article>

            </section>

          </section>

        <?php endforeach; ?>

      </div>

      <!-- MENSAJES -->
      <?php if (isset($_SESSION['asignado']) && $_SESSION['asignado']): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

          <strong>Asignado con exito!</strong> La visita se a asignado correctamente 

        </div>
      <?php endif; ?>

    </main>

  </div>

</section>



<?php
require_once __DIR__ . "/../layouts/footer.php";
?>