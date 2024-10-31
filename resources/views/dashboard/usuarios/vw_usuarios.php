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

    <main class="col-10 container">

      <h1> Bienvenido a tu panel admnistrativo /usuarios </h1>

      <?php if (isset($res) && $res): ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <strong>Usuario registrado con exito</strong>
        </div>
      <?php endif; ?>

      <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function (alert) {
          new bootstrap.Alert(alert);
        });
      </script>


      <section class="row">
        <article class="col-4">
          <form method="post" action="<?= Parameters::BASE_URL ?>/dashboard/usuario/guardar" class="needs-validation"
            novalidate>

            <div class="mb-3">
              <label for="username" class="form-label">Nombre de Usuario</label>
              <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp"
                required>
              <div id="usernameHelp" class="invalid-feedback">El usuario es requerido</div>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Correo Elctronico</label>
              <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
              <div id="emailHelp" class="invalid-feedback">El usuario es requerido</div>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Clave de Usuario</label>
              <input type="password" name="password" class="form-control" id="password" aria-describedby="passwordHelp"
                required>
              <div id="passwordHelp" class="invalid-feedback">El usuario es requerido</div>
            </div>

            <div class="mb-3">
              <label for="rol" class="form-label">Asignar Rol</label>
              <select name="rol_id" class="form-control" id="rol_id" aria-describedby="rolHelp" required>
                <option value=""> --- Asignar Rol --- </option>
                <option value="1">ADMINISTRADOR</option>
                <option value="2">VISITADOR</option>
              </select>
              <div id="rolHelp" class="invalid-feedback">El usuario es requerido</div>
            </div>


            <button type="submit" class="btn btn-primary">Guardar Usuario</button>

          </form>
        </article>

        <article class="col-8">

          <table class="table table-striped table-hover">

            <thead>
              <tr>
                <th>CODIGO</th>
                <th>ROL</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>ESTADO</th>
              </tr>

            </thead>

            <tbody>

              <?php foreach ($lista_usuarios as $usuario): ?>

                <tr>
                  <th> <?php echo $usuario->getCodigo(); ?> </th>
                  <th> <?php echo $usuario->getRol()->getNombre() ; ?> </th>
                  <th> <?php echo $usuario->getUserName() ; ?> </th>
                  <th> <?php echo $usuario->getEmail(); ?> </th>
                  <th> <span class="badge <?php 
                  echo $usuario->getEstado() === 'ACTIVO' ? 'text-bg-success' : 'text-bg-danger'; ?> ">
                      <?php echo 'activo'; ?> </span> </th>
                </tr>

              <?php endforeach; ?>

            </tbody>

          </table>

        </article>
      </section>

    </main>

  </div>

</section>


<script>
  (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>

<?php
require_once __DIR__ . "/../layouts/footer.php";
?>