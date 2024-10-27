<?php
// +++++++++ mi front controller +++++++++
use App\Config\Parameters;


// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Verificar si se han pasado los parámetros module y controller
if( isset($_GET['module']) && isset($_GET['controller']) ) {
    // Construir el nombre completo del controlador según el módulo y controlador
    $module = ucfirst($_GET['module']); // Ej: Productos, Errors (mayúscula inicial)
    $controller = ucfirst($_GET['controller']); // Ej: Producto, Error404
    $name_controller = "App\\Controllers\\" . $module . "\\" . $controller . "Controller";

} elseif ( !isset($_GET['controller']) && !isset($_GET['action']) ) {
    // Si no se especifica controlador ni acción, usar los valores por defecto globales
    $name_controller = Parameters::DEFAULT_CONTROLLER;
    $action = Parameters::DEFAULT_ACTION;

} else {
    // Redirigir a la página de error si faltan los parámetros requeridos
    $url = Parameters::BASE_URL . "/Errors/Error/not_found";
    header("Location: $url");
    exit();
}

// Comprobar si la clase del controlador existe
if (class_exists($name_controller)) {
    // Instanciar el controlador
    $controller = new $name_controller();

    if ( isset($_GET['action']) ) {
      $action = $_GET['action'];
    }

    // Verificar si el método (acción) existe en el controlador
    if (method_exists($controller, $action)) {
        $controller->$action(); // Llamar al método del controlador
    } else {
        // Si el método no existe, redirigir al error 404
        $url = Parameters::BASE_URL . "/Errors/Error/server_error";
        header("Location: $url");
        exit();
    }

} else {
    // Redirigir a la página de error si el controlador no existe
    $url = Parameters::BASE_URL . "/Errors/Error/server_error";
    header("Location: $url");
    exit();
}


