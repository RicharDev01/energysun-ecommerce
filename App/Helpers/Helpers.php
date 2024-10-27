<?php

namespace App\Helpers;

use DateTime;
use Exception;

class Helpers
{

  /**
   * Funcion que me ayuda a eliminar una variables de sesion
   * USU comun, por ejemplo cuando tengo una variable de sesion de error
   * quiero eliminarla una vez mostrada, no interesa que viva durante toda la sesion
   * @param $name
   * @return mixed
   */
  public static function deleteSession($name)
  {

    if (isset($_SESSION[$name])) {

      $_SESSION[$name] = null;

      unset($_SESSION[$name]);
    }
    return $name;
  }

  /**
   * funcion que convierte decimales de 0 a 1 en un porcentaje
   * por ejemplo 0.25 te devuelve 25%
   * @param $numero_decimal
   * @return string
   */
  public static function decimal_a_porcentaje($numero_decimal)
  {
    return number_format($numero_decimal * 100, 0) . '%';
  }

  /**
   * Funcion de ayuda, para determinar un intervalo de tiempo
   * @param mixed $fecha_registro
   * @return string
   */
  public static function determinar_estado_producto($fecha_registro): string
  {
    // Validar y convertir el registro de fecha a DateTime
    if (is_string($fecha_registro)) {
      try {
        $fecha_registro = new DateTime($fecha_registro);
      } catch (Exception $e) {
        return ""; // Si no se puede convertir, retorna vacío
      }
    } elseif (!$fecha_registro instanceof DateTime) {
      return ""; // Si no es DateTime después de validar, retorna vacío
    }

    $fecha_actual = new DateTime();
    $intervalo = $fecha_actual->diff($fecha_registro);

    // Verificar si han pasado 24 horas (1 día)
    $horas_diferencia = $intervalo->h + ($intervalo->days * 24);

    return ($horas_diferencia < 24) ? "nuevo" : "";
  }

  /**
   * Funcion que recibe el precio original y el descuento (0 a 1)
   * y devuelve el precio naplicando el descuento
   * ejemplo: el precio original de $100 y el valor de descuento 0.25
   * devolvera el valor del precio con descuento, es decir, $75.00
   * @param float $precio
   * @param float $descuento
   * @return float
   */
  public static function aplicar_descuento(float $precio, float $descuento): float {
    // Asegurarse de que el descuento esté entre 0 y 1
    if ($descuento < 0 || $descuento > 1) {
      echo ("El descuento debe estar entre 0 y 1.");
    }

    // Calcular el precio con el descuento
    $precioConDescuento = $precio * (1 - $descuento);

    // Retornar el resultado redondeado a dos decimales
    return round($precioConDescuento, 2);
  }


  /**
   * Valido si la fecha ingresada es menor a la fecha actual
   * @param string $fecha
   * @return bool
   */
  public static function validarFechaNoAnterior(string $fecha): bool {
    // Convertir la fecha proporcionada y la fecha actual a objetos DateTime
    $fechaIngresada = new DateTime($fecha);
    $fechaActual = new DateTime(); // Fecha y hora actual

    // Comparar fechas, retorna true si la fecha ingresada no es anterior
    return $fechaIngresada >= $fechaActual;
}


}
