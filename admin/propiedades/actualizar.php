<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use App\Propiedad;

  // Importar la conexion
  require '../../includes/app.php';
  estaAutenticado();


  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id) {
  header('Location: admin/index.php');
}

  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);


// Obtener los datos de la propiedad
$propiedad = Propiedad::find($id);

// Consultar para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo con mensajes de errores
$errores = [];


// Ejecutar el codigo despues de que el usuario envia el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Asignar los atributos
  $args = [];
  $args['titulo'] = $_POST['titulo'] ?? null;

  $propiedad->sincronizar($args);

// Asignar files hacia una variable
$imagen = $_FILES['imagen'];


  
  if(!$titulo) {
    $errores[] = "Debes ponerle un titulo a la Propiedad";
  }
  if(!$precio) {
    $errores[] = "Debes asignarle un precio a la Propiedad";
  }
 
  if( strlen ($descripcion) < 50 ) {
    $errores[] = "Asegurate de ponerle una descripcion que contenga minimo 50 caracteres";
  }
  if(!$habitaciones) {
    $errores[] = "El numero de habitaciones es obligatorio";
  }
 
  if(!$wc) {
    $errores[] = "Debes especificar cuantos Baños tiene la Propiedad";
  }
 
  if(!$estacionamiento) {
    $errores[] = "El campo de estacionamiento es obligatorio";
  }
 
  if(!$vendedorId) {
    $errores[] = "Elige un vendedor";
  }


  // Validar por size (100 Kb Maximo)
 $medida = 1000 * 100;


 if($imagen['size'] > $medida) {
  $errores[] = 'La imagen es muy pesada';
}
 

  // Revisar que el array de errores este vacio
  if(empty($errores)) {
//crear carpeta//
$carpetaImagenes = '../../imagenes/';

if(!is_dir($carpetaImagenes)) {
  mkdir($carpetaImagenes);
}  

$nombreImagen = '';

    //SUBIDA DE ARCHIVOS//

if($imagen['name']) {
  // Eliminar la imagen previa

  unlink($carpetaImagenes . $propiedad['imagen']);

  // // Generar un nombre unico
  $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";

  // // Subir la imagen
   move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );
} else {
  $nombreImagen = $propiedad['imagen'];
}

  
      // Insertar en la BD
  $query = " UPDATE propiedades SET titulo = '{$titulo}', precio = {$precio}, imagen = '{$nombreImagen}', descripcion = '{$descripcion}', habitaciones = {$habitaciones}, wc = {$wc}, estacionamiento = {$estacionamiento}, vendedorId = {$vendedorId} WHERE id = {$id} ";

  //  echo $query;

  //  exit;

$resultado = mysqli_query($db, $query);

if($resultado) {
    // Redireccionar al usuario.

    header('Location: /admin?resultado=2');
  } 
}


  }

incluirTemplate('header');
?>

  <main class="contenedor seccion">
    <h1>Actualizar</h1>

    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

<?php foreach($errores as $error): ?>
  <div class="alerta error">
    <?php echo $error; ?>
  </div>
  <?php endforeach; ?>

  <form class="formulario" method="POST"  enctype="multipart/form-data">
  <?php include '../../includes/templates/formulario_propiedades.php' ?>

  <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

  </form>

  </main>

  <?php
  incluirTemplate('footer');
?>