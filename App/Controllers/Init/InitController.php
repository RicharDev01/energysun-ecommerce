<?php

namespace App\Controllers\Init;

class InitController {

  public function index(): void{
    
    // Usando ruta relativa con __DIR__
    require_once __DIR__ . '/../../../resources/views/home/vw_home.php';

  }

  public function aboutus(): void{

    // Usando ruta relativa con __DIR__
    require_once __DIR__ . '/../../../resources/views/home/vw_aboutus.php';

  }

  public function contact(): void{

    // Usando ruta relativa con __DIR__
    require_once __DIR__ . '/../../../resources/views/home/vw_contact.php';

  }


}