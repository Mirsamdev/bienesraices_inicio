<?php

// Base de datos

require '../../includes/config/database.php';
$db = conectarDB();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre>";

  $titulo = $_POST['titulo'];
  $precio = $_POST['precio'];
  $descripcion = $_POST['descripcion'];
  $habitaciones = $_POST['habitaciones'];
  $wc = $_POST['wc'];
  $estacionamiento = $_POST['estacionamiento'];
  $vendedorId = $_POST['vendedor'];
  

  // Insertar en la BD
  $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedorId) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento','$vendedorId');";

//  echo $query;

$resultado = mysqli_query($db, $query);

if($resultado) {
  echo "Insertado Correctamente";
} 
}


require '../../includes/funciones.php';
incluirTemplate('header');
?>

  <main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/bienesraices_inicio/admin/index.php" class="boton boton-verde">Volver</a>

  <a href=""></a>

  <form class="formulario" method="POST" action="/bienesraices_inicio/admin/propiedades/crear.php">
    <fieldset>
      <legend>Inforacion General</legend>

      <label for="titulo">Titulo:</label>
      <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad">

      <label for="precio">Precio:</label>
      <input type="number" id="precio" name="precio" placeholder="Precio Propiedad">

      <label for="imagen">Imagen:</label>
      <input type="file" id="imagen" accept="image/jpeg, image/png">

      <label for="descripcion">Descripcion:</label>
      <textarea  id="descripcion" name="descripcion"></textarea>

    </fieldset>

  <fieldset>
    <legend>Informacion Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9">

    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9">

    <label for="estacionamiento">Estacionamiento:</label>
    <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9">

  </fieldset>

  <fieldset>
  <legend>Vendedor</legend>

  <select name="vendedor">
    <option value="1">Juan</option>
    <option value="2">Karen</option>
  </select>

  </fieldset>

  <input type="submit" value="Crear Propiedad" class="boton boton-verde">

  </form>

  </main>

  <?php
  incluirTemplate('footer');
?>