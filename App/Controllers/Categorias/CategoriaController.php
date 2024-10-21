<?php 

namespace App\Controllers\Categorias;

use App\DAO\CategoriaDao;

class CategoriaController{

  private CategoriaDao $categoriaDao;
  public $message = '';

  /**
   * @param CategoriaDao categoriaDao
   */
  public function __construct()
  {
    $this->categoriaDao = new CategoriaDao();
  }

  /**
   * Lista de las categorias
   */
  public function lista(){

    $lista_categorias = $this->categoriaDao->find_all();

    return $lista_categorias;

  }

}