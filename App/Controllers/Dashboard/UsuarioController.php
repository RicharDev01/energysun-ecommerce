<?php

namespace App\Controllers\Dashboard;

class UsuarioController
{
  public function vista() {
    require_once __DIR__ . "/../../../resources/views/dashboard/usuarios/vw_usuarios.php";
  }
}