<?php

namespace App;

class ActiveRecord {
// Base de DATOS 
protected static $db;
protected static $columnasDB = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado','vendedorId'];
// Errores
protected static $tabla = '';
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
 $this->vendedorId = $args['vendedorId'] ?? 1;
}
public function guardar() {
  if(isset($this->id)) {
  // actualizar
  $this->actualizar();
} else {
  // creando un nuevo registro
  $this->crear();
}
}

public function crear() {

    // Sanitizar los datos
    $atributos = $this->sanitizarAtributos();

   

    
       // Insertar en la BD
       $query = " INSERT INTO " . static::$tabla . " (";
       $query .= join(', ',array_keys($atributos));
       $query .=" ) VALUES (' ";
       $query .= join("', '",array_values($atributos));
       $query .= " ') ";

       $resultado = self::$db->query($query);
      
       return $resultado;
     }

     public function actualizar() {
         // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key => $value) {
          $valores[] = "{$key}='{$value}'";
        }
        $query = "UPDATE  " . static::$tabla . " SET ";
        $query .= join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1";

        $resultado = self::$db->query($query);
        
        if($resultado) {
          // Redireccionar al usuario.
        header('Location: /admin?resultado=2');
          } 
     }

     // Eliminar un registro
     public function eliminar() {
        $query = "DELETE FROM  " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado) {
          $this->borrarImagen();
          header('location: /admin?resultado=3');
        }
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
  if(isset($this->id) ) {
   $this->borrarImagen();
  }

  if($imagen) {
    // Asignar al atributo de la imagen el nombre de la imagen
    $this->imagen = $imagen;
  }
}
// Elimina el archivo
public function borrarImagen() {
   // Verificar si el archivo existe
   $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
   if($existeArchivo) {
     // Eliminar imagen anterior
     unlink(CARPETA_IMAGENES . $this->imagen);
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
    self::$errores[] = "Debes asignarle un precio a la Propiedad";
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


// Lista todas los registros
public static function all() {
  $query = "SELECT * FROM " . static::$tabla;

  $resultado = self::consultarSQL($query);

  return $resultado;
}

// Busca un registro por su id 
public static function find($id) {
  $query = "SELECT * FROM propiedades WHERE id = {$id}";

  $resultado = self::consultarSQL($query);

  return array_shift ($resultado) ;
}


  public static function consultarSQL($query) {
    // Consultar la base de datos
    $resultado = self::$db->query($query);
    // Iterar los resultados
    $array = [];
    while($registro = $resultado->fetch_assoc()) {
      $array[] = self::crearObjeto($registro);
    }

    // Liberar la memoria 
    $resultado->free();
    // Retornar los resultados
    return $array;
}

protected static function crearObjeto($registro) {
  $objeto = new self;

  foreach($registro as $key => $value) {
    if(property_exists( $objeto, $key )) {
      $objeto->$key = $value;
    }
  }
  return $objeto;
}

public function sincronizar( $args = [] ) {
  foreach($args as $key => $value) {
    if(property_exists($this, $key ) && !is_null($value)) {
      $this->$key = $value;
  }
} 
}
}