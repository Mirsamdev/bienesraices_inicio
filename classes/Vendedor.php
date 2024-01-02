<?php

namespace App;

class Vendedor extends ActiveRecord {

  protected static $tabla = 'vendedores';
  protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

  public $id;
  public $nombre;
  public $apellido;
  public $telefono;

  public function __construct($args = []) {

    // Asignamos a titulo un arreglo titulo y en caso que no este titulo va ser string vacío
     $this->id = $args['id'] ?? '';
     $this->nombre = $args['nombre'] ?? '';
     $this->apellido = $args['apellido'] ?? '';
     $this->telefono = $args['telefono'] ?? '';
    }
}