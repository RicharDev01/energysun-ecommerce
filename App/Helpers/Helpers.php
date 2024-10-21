<?php

namespace App\Helpers;

class Helpers {

  public static function deleteSession($name) {

    if ( isset( $_SESSION[$name] ) ) {

      $_SESSION[$name]  = null;

      unset($_SESSION[$name]);
    }
    return $name;
  }

}
