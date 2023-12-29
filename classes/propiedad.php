<?php

namespace App;

class Propiedad {
  // Base de DATOS 
  protected static $db;
  protected static $columnasDB = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedorId'];
  // Errores
  protected static $errores = [];

  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $habitaciones;
  public $wc;
  public $estacionamiento;
  public $creado;
  public $vendedorId;

   // Definir la conexion a la BD
   public static function setDB($database) {
    self::$db = $database;
  }

  public function __construct($args = [])
  {
  //Asignamos a titulo un arreglo titulo y en caso que no este titulo va ser string vacío
   $this->id = $args['id'] ?? '';
   $this->titulo = $args['titulo'] ?? '';
   $this->precio = $args['precio'] ?? '';
   $this->imagen = $args['imagen'] ?? '';
   $this->descripcion = $args['descripcion'] ?? '';
   $this->habitaciones = $args['habitaciones'] ?? '';
   $this->wc = $args['wc'] ?? 0;
   $this->estacionamiento = $args['estacionamiento'] ?? '';
   $this->creado = date('Y/m/d');
   $this->vendedorId = $args['vendedorId'] ?? '';
  }

  public function guardar() {

      // Sanitizar los datos
      $atributos = $this->sanitizarAtributos();

     

      
         // Insertar en la BD
         $query = " INSERT INTO propiedades (";
         $query .= join(', ',array_keys($atributos));
         $query .=" ) VALUES (' ";
         $query .= join("', '",array_values($atributos));
         $query .= " ') ";

         $resultado = self::$db->query($query);
        
         return $resultado;
       }

       // Identificar y unir los atributos de la BD
       public function atributos() {
        $atributos = [];
        foreach(self::$columnasDB as $columna) {
          if($columna === 'id') continue;
          $atributos[$columna] = $this->$columna;
        }
        return $atributos;
       }

       public function sanitizarAtributos() {
        $atributos = $this->atributos();
       $sanitizado = [];
       foreach($atributos as $key => $value) {
        $sanitizado[$key] = self::$db->escape_string($value);
       }
       return $sanitizado;
  }
  // Subida de archivos
  public function setImagen($imagen) {
    if($imagen) {
      // Asignar al atributo de la imagen el nombre de la imagen
      $this->imagen = $imagen;
    }
  }

  // Validacion 
  public static function getErrores() {
    return self::$errores;
  }

  public function validar() {
    
    if(!$this->titulo) {
      self::$errores[] = "Debes ponerle un titulo a la Propiedad";
    }
  if(!$this->precio) {
    $this->errores[] = "Debes asignarle un precio a la Propiedad";
  }
 
  if( strlen ($this->descripcion) < 50 ) {
    self::$errores[] = "Asegurate de ponerle una descripcion que contenga minimo 50 caracteres";
  }
  if(!$this->habitaciones) {
    self::$errores[] = "El numero de habitaciones es obligatorio";
  }
 
  if(!$this->wc) {
    self::$errores[] = "Debes especificar cuantos Baños tiene la Propiedad";
  }
 
  if(!$this->estacionamiento) {
    self::$errores[] = "El campo de estacionamiento es obligatorio";
  }
 
  if(!$this->vendedorId) {
    self::$errores[] = "Elige un vendedor";
  }

 if(!$this->imagen) {
   self::$errores[] = 'La imagen es Obligatoria';
 }

  return self::$errores;
   }
  }

