<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require '../../includes/app.php';

  use App\Propiedad;
  use Intervention\Image\ImageManagerStatic as Image;

  

  $auth = estaAutenticado();
  
  if(!$auth) {
    header('Location: /admin');
  }
// Base de datos

$db = conectarDB();

$propiedad = new Propiedad;

// Consultar para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo con mensajes de errores
$errores = Propiedad::getErrores();


// Ejecutar el codigo despues de que el usuario envia el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $propiedad = new Propiedad($_POST);

    //SUBIDA DE ARCHIVOS//
   

    // Generar un nombre unico
    $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";

    //Setear la imagen
    if($_FILES['imagen']['tmp_name']) {
      $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
      $propiedad->setImagen($nombreImagen);
    }
    


    // Validar
    $errores = $propiedad->validar();
    $CARPETA_IMAGENES = '../../imagenes/';
    if(empty($errores)) {
    // Crear la carpeta para subir imagenes
    if(!is_dir(CARPETA_IMAGENES)) {
      mkdir(CARPETA_IMAGENES);
    };

    // Guardar la imagen
    $image->save($CARPETA_IMAGENES . $nombreImagen);

    // Guarda en la BD
   $resultado = $propiedad->guardar();

    // Mensaje de exito
    if($resultado) {
      // Redireccionar al usuario.
      header('Location: /admin?resultado=1');
    } 
  }
  }
  
incluirTemplate('header');
?>

  <main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="admin/index.php" class="boton boton-verde">Volver</a>

<?php foreach($errores as $error): ?>
  <div class="alerta error">
    <?php echo $error; ?>
  </div>
  <?php endforeach; ?>

  <?php include '../../includes/templates/formulario_propiedades.php' ?>

<input type="submit" value="Crear Propiedad" class="boton boton-verde">

  </form>

  </main>

  <?php
  incluirTemplate('footer');
?>

 