<?php

namespace App\Controllers;

class InitController {

  public function index(): void{
    
    // Usando ruta relativa con __DIR__
    require_once __DIR__ . '/../../resources/views/home/vw_home.php';

  }

}