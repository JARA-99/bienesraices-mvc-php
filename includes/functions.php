<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCTIONS_URL', __DIR__ . '/functions.php');
define('FOLDER_IMAGES_URL', $_SERVER['DOCUMENT_ROOT'] . '/images/');

function includeTemplate(string $templateName, bool $init = false)
{
  include TEMPLATES_URL . "/{$templateName}.php";
}

function isAuth()
{
  session_start();

  if (!$_SESSION['login']) {
    header("Location: /");
  }
}

function debugging($param)
{
  echo '<pre>';
  var_dump($param);
  echo '</pre>';
  exit;
}

//* Escapa / Sanitizar el HTML
function s($html)
{
  $s = htmlspecialchars($html);
  return $s;
}

//* Validar tipo de contenido
function validarTipoContenido($tipo)
{
  $tipos = ['vendedor', 'propiedad'];

  return in_array($tipo, $tipos);
}

//* Mostrar mensajes
function showNotification($code) {
  $msg = "";
  
  switch ($code) {
    case 1:
      $msg = "Registrado Correctamente";
      break;

    case 2:
      $msg = "Actualizado Correctamente";
      break;

    case 3:
      $msg = "Eliminado Correctamente";
      break;
    
    default:
     $msg = false;
      break;
  }

  return $msg;
}

function validarORedireccionar(string $url) {
  //* Validar la URL por ID válido
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if (!$id) {
    header("Location: {$url}");
  }

  return $id;
}