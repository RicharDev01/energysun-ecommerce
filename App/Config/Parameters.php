<?php 

namespace App\Config;

class Parameters {
  // const BASE_URL = "http://localhost/Proyectos-php/EnergySun/";
  // const BASE_URL = "http://localhost/EnergySun/";
  const BASE_URL = "http://energysun.com"; // virtual hots

  // controlador por defecto
  const DEFAULT_CONTROLLER = "App\Controllers\Init\InitController";

  // la accion por defecto
  const DEFAULT_ACTION = "index";

  const IVA = 0.13; // el impuesto del 13%

}