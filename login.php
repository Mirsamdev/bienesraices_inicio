<?php
// Importar la base de datos
require 'includes/config/database.php';
$db = conectarDB();

$errores = [];
// Autenticar el usuario
if($_SERVER['REQUEST_METHOD'] === 'POST' ) {
  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre>";

  $email = mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) );
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if(!$email) {
    $errores[] = "El email es obligatorio";
  }

  if(!$password) {
    $errores[] = "Ingresa tu contraseña.";
  }


if(empty($errores)) {
  // Revisar si el usuario existe 
  $query = "SELECT * FROM usuarios WHERE email = '{$email}' ";
  $resultado = mysqli_query($db, $query);



  if( $resultado->num_rows ) {
    // Revisar si el password es correcto
    $usuario = mysqli_fetch_assoc($resultado);

    // var_dump($usuario);

    // Verificar si el password es correcto o no

    $auth = password_verify($password, $usuario['password']);
    var_dump($auth);
    if($auth) {
      // El usuario esta autenticado
      session_start();

      // Llenar el arreglo de la sesion
      $_SESSION['usuario'] = $usuario['email'];
      $_SESSION['login'] = true;

      header('Location: admin/index.php');

    } else {
      $errores[] = 'La contraseña es incorrecta';
    }
  } else {
    $errores[] = "El Usuario no existe";
  }
}
}

// Incluye el header
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
  <h1>Iniciar Sesion</h1>

  <?php foreach($errores as $error): ?>
    <div class="alerta error">
      <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario">
      <fieldset>
        <legend>Email y Password</legend>

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Tu E-mail" id="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Tu Contraseña" id="password" required>
    </fieldset>
    <input type="submit" value="Iniciar Sesion" class="boton boton-verde boton-verde-borde">
  </form>
</main>

<?php
incluirTemplate('footer');
?>