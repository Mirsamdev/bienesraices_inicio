<?php
  session_start();
  // Importar la conexion
  require '../../includes/funciones.php';
  $auth = $_SESSION['login'];
  
  if(!$auth) {
    header('Location: /bienesraices_inicio/admin');
  }

  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id) {
  header('Location: /bienesraices_inicio/admin/index.php');
}

  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);
// Base de datos

require '../../includes/config/database.php';
$db = conectarDB();
// Obtener los datos de la propiedad
$consulta = "SELECT * FROM propiedades WHERE id = {$id}";
$resultado = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($resultado);



// Consultar para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo con mensajes de errores
$errores = [];

$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedorId'];
$imagenPropiedad = $propiedad['imagen'];
// Ejecutar el codigo despues de que el usuario envia el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST') {


  $titulo = mysqli_real_escape_string( $db, $_POST['titulo']);
  $precio = mysqli_real_escape_string( $db, $_POST['precio']);
  $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion']);
  $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones']);
  $wc = mysqli_real_escape_string( $db, $_POST['wc']);
  $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento']);
  $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor']);
  $creado = date('Y/m/d');

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

    header('Location: /bienesraices_inicio/admin?resultado=2');
  } 
}


  }




require '../../includes/funciones.php';
incluirTemplate('header');
?>

  <main class="contenedor seccion">
    <h1>Actualizar</h1>

    <a href="/bienesraices_inicio/admin/index.php" class="boton boton-verde">Volver</a>

<?php foreach($errores as $error): ?>
  <div class="alerta error">
    <?php echo $error; ?>
  </div>
  <?php endforeach; ?>

  <form class="formulario" method="POST"  enctype="multipart/form-data">
    <fieldset>
      <legend>Inforacion General</legend>

      <label for="titulo">Titulo:</label>
      <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

      <label for="precio">Precio:</label>
      <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

      <img src="/bienesraices_inicio/imagenes/<?php echo $imagenPropiedad ?>" class="imagen-small">

      <label for="descripcion">Descripcion:</label>
      <textarea  id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>

    </fieldset>

  <fieldset>
    <legend>Informacion Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">

    <label for="estacionamiento">Estacionamiento:</label>
    <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">

  </fieldset>

  <fieldset>
  <legend>Vendedor</legend>

  <select name="vendedor">
    <option value="">>-- Seleccione --<</option>
    <?php while($vendedor = mysqli_fetch_assoc($resultado) ) : ?>
      <option  <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?>  value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " .$vendedor['apellido']; ?> </option>

    <?php endwhile; ?>      
  </select>

  </fieldset>

  <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

  </form>

  </main>

  <?php
  incluirTemplate('footer');
?>