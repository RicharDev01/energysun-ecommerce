<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
use App\Config\Parameters;

?>
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EnergySun - Soluciones energéticas</title>

  <link rel="shortcut icon" href="<?= Parameters::BASE_URL . '/resources/images/logo-energysun-blanco.png' ?>"
    type="image/x-icon">
  <link rel="stylesheet" href="<?= Parameters::BASE_URL . '/resources/styles/style.css' ?>">

</head>

<body>

<!--  -->

  <header>
    <nav class="navbar container">

      <!-- CONTENIDO DEL LOGO -->
      <a href="<?= Parameters::BASE_URL ?>" class="logo-container">
        <img src="<?= Parameters::BASE_URL . '/resources/images/logo-energysun-blanco.png' ?>" alt="Logo EnergySun"
          class="logo-image">
        <span class="logo-name">EnergySun</span>
      </a>
      <!-- MENU PRINCIPAL LOGEADO O NO -->
      <div class="menu-container" id="menu-container">
        <ul class="menu">
          <li class="menu__item">
            <a href="<?= Parameters::BASE_URL ?>" class="menu__link">Inicio</a>
          </li>
          <li class="menu__item">
            <a href="<?= Parameters::BASE_URL . '/productos/producto/lista' ?>" class="menu__link">Productos</a>
          </li>
          <li class="menu__item">
            <a href="<?= Parameters::BASE_URL . '/servicios/servicio/lista' ?>" class="menu__link">Servicios</a>
          </li>
        </ul>


        <?php if ( isset( $_SESSION['usuario'] ) ): ?>
          
          <!-- UNA VEZ LOGUEADO -->
          <div class="auth">
          
            <?php if( isset( $_SESSION['ADMINISTRADOR'] ) && $_SESSION['ADMINISTRADOR'] ): ?>
              <a 
                href="<?= Parameters::BASE_URL ?>/dashboard/inicio/vista" 
                class="btn btn-primary" 
                type="button"> 
                <?php echo $_SESSION['usuario']->getUsername(); ?> 
              </a>
            <?php elseif( isset( $_SESSION['CLIENTE'] ) && $_SESSION['CLIENTE'] ):  ?>
              <a 
                href="#" 
                class="btn btn-primary" 
                type="button"> 
                <?php echo $_SESSION['usuario']->getUsername(); ?> 
              </a>
            <?php endif; ?>

            <a href="<?php Parameters::BASE_URL ?>/auth/login/cerrar_sesion" class="btn btn-danger" >Cerrar sesion</a>
          </div>
        <?php else: ?>
          <!-- BOTONES DE REGISTRO -->
          <div class="auth">
            <a href="<?php Parameters::BASE_URL ?>/auth/registro/vista" class="btn btn-primary" type="button">Registrate</a>
            <a href="<?= Parameters::BASE_URL . '/Auth/login/vista' ?>" class="btn btn-bg-accent">Iniciar sesion</a>
          </div>
        <?php endif; ?>




      </div>

      <!-- PARA EL MENU MOBILE -->
      <section class="hamburger-menu" id="hamburger-menu">

        <img src="<?= Parameters::BASE_URL . '/resources/images/icons/menu-icon.svg' ?>" alt="icono de menu"
          id="icon-menu">

      </section>

    </nav>

  </header>