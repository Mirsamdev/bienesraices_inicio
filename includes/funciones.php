<?php
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');
use App\Propiedad;

function incluirTemplate ( string $nombre, bool $inicio = false ) {
  include TEMPLATES_URL . "/{$nombre}.php";
}

function estaAutenticado() {
session_start();

$auth = $_SESSION['login'];
if($auth) {
  return true;
}
return false;
}

  function debuguear($variable) {
  echo "<pre>";
  var_dump($variable);
  echo "</pre>";

  exit;
  }

  